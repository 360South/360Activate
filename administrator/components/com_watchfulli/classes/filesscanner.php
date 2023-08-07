<?php
/**
 * @version     admin/classes/filesscanner.php 2020-05-27 zanardigit
 * @package     Watchful Client
 * @author      Watchful
 * @authorUrl   https://watchful.net
 * @copyright   Copyright (c) 2012-2023 Watchful
 * @license     GNU/GPL v3 or later
 */

use Joomla\CMS\Filesystem\File;

defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');

class WatchfulliFilesScanner extends WatchfulliAuditProcess
{
	const MINIMUMFOLDERSPERMISSION = 755;
	const MINIMUMFILESPERMISSION = 655;

	/** @var stdClass */
	private $structure;

	/** @var array */
	private $hashes;

	/** @var array */
	private $nonCoreFiles;

	public function __construct()
	{
		parent::__construct();
		$time_limit         = $this->getMaxExecutionTime();
		$this->structure    = $this->cache->get(['WatchfulliRecursiveListing', 'getStructure'], [JPATH_SITE, $time_limit]);
		$this->hashes       = $this->cache->get(['WatchfulliConnection', 'getHash']);
		$this->nonCoreFiles = $this->cache->get(['WatchfulliRecursiveListing', 'getNonCoreFiles'], [$this->structure, $this->hashes, $time_limit]);
	}

	/**
	 * Audit folders permissions
	 *
	 * @param   int  $start
	 *
	 * @return stdClass
	 */
	public function auditFolderPermissions($start)
	{
		$folders      = $this->structure->dirs;
		$pathFromRoot = '';

		$result        = new stdClass();
		$result->wrong = []; // files with wrong permission
		$result->size  = count($folders);
		$result->start = $start;

		$current = $start;
		while ($this->haveTime() && $current < count($folders))
		{
			$pathFromRoot = str_replace(JPATH_BASE, '', $folders[$current]);
			$permission   = $this->checkPermissions($folders[$current]);
			if ($permission > self::MINIMUMFOLDERSPERMISSION)
			{
				$result->wrong[] = [rtrim($pathFromRoot, '/') . '/', $permission];
			}
			$current++;
		}
		$result->lastFolderChecked = $pathFromRoot;
		$result->end               = $current;

		return $result;
	}

	/**
	 *
	 * @param   int  $start
	 *
	 * @return stdClass
	 */
	public function auditMalwareScanner($start = 0)
	{
		$this->step_time = 15;
		$files           = $this->nonCoreFiles;
		$result          = new stdClass();
		$result->wrong   = []; // files with problems
		$result->size    = count($files);
		$result->start   = $start;

		$current = $start;

		while ($this->haveTime() && $current < count($files))
		{
			$check = $this->checkSignatures($files[$current]);
			if ($check)
			{
				$result->wrong[] = $check;
			}
			$current++;
		}

		$result->lastFileChecked = $files[$current];
		$result->end             = $current;

		if ($current == count($files))
		{
			$this->cache->cache->clean();
			$this->cache->cache->gc();
		}

		return $result;
	}

	/**
	 *
	 * @param   int  $start
	 *
	 * @return stdClass
	 */
	public function auditFilesPermissions($start = 0)
	{
		$files         = $this->structure->files;
		$result        = new stdClass();
		$result->wrong = []; // files with wrong permission
		$result->size  = count($files);
		$result->start = $start;

		$current = $start;
		while ($this->haveTime() && $current < $result->size)
		{
			$permission = $this->checkPermissions($files[$current]);
			if ($permission >= self::MINIMUMFILESPERMISSION)
			{
				$pathFromRoot    = str_replace(JPATH_BASE, '', $files[$current]);
				$result->wrong[] = [$pathFromRoot, $permission];
			}
			$current++;
		}

		$result->lastFileChecked = $files[$current];
		$result->end             = $current;

		return $result;
	}

	/**
	 *
	 * @param   string  $file
	 *
	 * @return array|false
	 */
	private function checkSignatures($file)
	{
		$signatures = $this->cache->get(['WatchfulliConnection', 'getSignatures']);

		if (!$this->needToCheckThisFile($file))
		{
			return false;
		}

		$contents      = null;
		$fileExtension = File::getExt($file);
		$pathFromRoot  = str_replace(JPATH_BASE, '', $file);

		if ($fileExtension == 'php')
		{
			//Return content without comments
			$contents = php_strip_whitespace($file);
		}

		// If not a PHP file or if previous function return null
		//  see PHP bug https://bugs.php.net/bug.php?id=29606
		if (empty($contents))
		{
			$contents = file_get_contents($file);
		}

		foreach ($signatures as $signature)
		{
			if ($this->shouldMatchContent($signature, $fileExtension))
			{
				if (preg_match_all('#(\{|\(|\s|\/\*.*\*\/|@|^)' . $signature->signature . '#i', $contents, $matches))
				{
					return [
						'path'         => $pathFromRoot,
						'match'        => substr($matches[0][0], 0, 50),
						'reason'       => $signature->reason,
						'signature_id' => $signature->id,
						'hash'         => md5_file($file),
					];
				}
			}
			elseif ($signature->type == 'filename')
			{
				if (preg_match('#' . $signature->signature . '#i', basename($file), $match))
				{
					return [
						'path'         => $pathFromRoot,
						'match'        => $match[0],
						'reason'       => $signature->reason,
						'signature_id' => $signature->id,
						'hash'         => md5_file($file),
					];
				}
			}
		}

		return false;
	}

	private function shouldMatchContent($signature, $fileExtension)
	{
		if ($signature->type == 'regex-' . $fileExtension) {
			return true;
		}

		if ($signature->type == 'regex-robotstxt') {
			return true;
		}

		if ($signature->type == 'regex' && $fileExtension == 'php') {
			return true;
		}

		return false;
	}

	/**
	 *
	 * @param   string  $path
	 *
	 * @return boolean
	 */
	private function checkPermissions($path)
	{
		if (!is_readable($path))
		{
			return false;
		}

		return substr(decoct(@fileperms($path)), -3);
	}

	/**
	 *
	 * @param   string  $path
	 *
	 * @return boolean
	 */
	private function needToCheckThisFile($path)
	{

		$safeExtensions = [
			'DS_Store',
			'zip',
			'gzip',
			'gz',
			'doc',
			'docx',
			'xls',
			'xlsx',
			'ppt',
			'pptx',
			'pdf',
			'rtf',
			'mno',
			'ashx',
			'png',
			'psd',
			'wott',
			'ttf',
			'css',
			'swf',
			'flv',
			'po',
			'mo',
			'mov',
			'qt',
			'pot',
			'eot',
			'ini',
			'svg',
			'mpeg',
			'mvk',
			'mp3',
			'less',
			'sql',
			'wsdl',
			'woff',
			'xml',
			'php_expire',
			'jpa',
		];

		$excludePaths = [
			'%/akeeba_json.php',
			'%/akeeba_backend.id%.php',
			'%/akeeba_backend.php',
			'%/akeeba_backend.id%.log',
			'%/akeeba_backend.log',
			'%/akeeba_lazy.php',
			'%/akeeba_frontend.php',
			'%/stats/webalizer.current',
			'%/stats/usage_%.html',
			'%/components/libraries/cmslib/cache/cache__%',
			'%/cache/com_watchfulli%',
			'%/plugins/system/akgeoip/lib/vendor/guzzle/guzzle/%',
		];

		$path_parts = pathinfo($path);

		//If file deleted after caching
		if (!file_exists($path))
		{
			return false;
		}

		foreach ($excludePaths as $excludePath)
		{
			$excludeRegex = $this->generateRegex($excludePath);

			if (preg_match('#' . $excludeRegex . '#', $path_parts['dirname']))
			{
				return false;
			}
		}

		//Not check files > 2Mo
		if (filesize($path) > 2097152)
		{
			return false;
		}

		if (isset($path_parts['extension']) && in_array($path_parts['extension'], $safeExtensions))
		{
			return false;
		}

		return true;
	}

	/**
	 * Generate Regex from path
	 * Input %/akeeba_json.php
	 * Output .*\/akeeba_json\.php
	 *
	 * @param   string Path to be converted
	 *
	 * @return string Regex
	 */
	private function generateRegex($path)
	{
		$patterns = [
			'#\.#',
			'#/#',
			'#%#',
		];

		$replacements = [
			'\.',
			'\/',
			'.*',
		];

		return preg_replace($patterns, $replacements, $path);
	}

}
