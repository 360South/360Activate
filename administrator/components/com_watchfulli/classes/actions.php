<?php
/**
 * @version     admin/classes/actions.php 2020-05-27 zanardigit
 * @package     Watchful Client
 * @author      Watchful
 * @authorUrl   https://watchful.net
 * @copyright   Copyright (c) 2012-2023 Watchful
 * @license     GNU/GPL v3 or later
 */

use Joomla\CMS\Application\AdministratorApplication;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Installer\Installer;
use Joomla\CMS\Installer\InstallerHelper;
use Joomla\CMS\Table\Table;
use Joomla\CMS\Updater\Updater;

defined('_JEXEC') or die();
defined('WATCHFULLI_PATH') or die();

class WatchfulliActions
{
	/** @var CMSApplication */
	private $application;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		if (!Watchfulli::checkToken())
		{
			Watchfulli::debug("[ERROR] Invalid token");
			die;
		}
		$this->application = Factory::getApplication();
	}

	/**
	 *
	 */
	public function test()
	{
		die("<~ok~>");
	}

	/**
	 * Read and return local log (removing all sensitive information like the secret key)
	 */
	public function getLog()
	{
		$log_file = Factory::getConfig()->get('log_path') . '/watchfulli.log.php';
		if (!file_exists($log_file))
		{
			$this->application->close('COM_JMONITORING_CLIENT_GETLOG_NO_LOG');
		}

		$rows = [];
		foreach (explode("\n", file_get_contents($log_file)) as $row)
		{
			if (preg_match('/secret/', $row))
			{
				continue;
			}
			$rows[] = $row;
		}

		$this->response(
			[
				'task'    => 'getLog',
				'message' => implode("\n", $rows),
			]
		);
	}

	/**
	 * Run an extension update
	 *
	 * @return void (closes the app with a success or error message)
	 */
	public function doUpdate()
	{
		if ($this->application->getCfg('offline'))
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - Site is offline, exiting");
			$this->response(
				[
					'task'    => 'doUpdate',
					'status'  => 'offline',
					'message' => 'COM_JMONITORING_CLIENT_SITE_IS_OFFLINE',
				]
			);
		}

		$extParams          = $this->getExtensionParameters();
		$this->type         = empty($extParams->type) ? null : $extParams->type;
		$this->package_name = empty($extParams->package_name) ? null : $extParams->package_name;
		$this->update_url   = empty($extParams->update_url) ? null : $extParams->update_url;
		$this->jce_key      = empty($extParams->jce_key) ? null : $extParams->jce_key;
		$id                 = $this->application->input->get('extId', 0);

		//JCE update
		if ($this->type == 5)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - JCE plugin, calling doInstallJCEPlugins instead");
			$this->application->close($this->doInstallJCEPlugins($id));
		}

		// core update
		if ($this->type == 99)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - Core update, calling doInstallCore instead");
			$this->application->close($this->doInstallCore());
		}

		if (!$id)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - no update id, calling doInstall instead");
			$this->application->close($this->doInstall()); // No update ID, try normal install
		}

		$updaterow = Table::getInstance('update');
		$updaterow->load($id);

		if (!$updaterow->update_id)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - update record not found with the given id: " . $updaterow->update_id);
			$this->application->close("COM_JMONITORING_CANT_FIND_UPDATE_RECORD");
		}

		$update = new JUpdate;

		if (!$update->loadFromXML($updaterow->detailsurl))
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - unable to get load a valid XML from the given URL: " . $updaterow->detailsurl);
			$this->application->close("COM_JMONITORING_CANT_GET_UPDATE");
		}

		if (empty($this->update_url))
		{
			if (isset($update->get('downloadurl')->_data))
			{
				$this->update_url = $update->downloadurl->_data;
			}
			else
			{
				Watchfulli::debug("WatchfulliActions::doUpdate - unable to get the download URL for the update");
				$this->application->close("COM_JMONITORING_CANT_GET_UPDATE_URL");
			}
		}

		$file = InstallerHelper::downloadPackage($this->update_url, $this->package_name);

		// Was the package downloaded?
		if (!$file)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - unable to download the update");
			$this->application->close("COM_JMONITORING_CANT_DOWNLOAD_UPDATE");
		}

		$config   = Factory::getConfig();
		$tmp_path = $config->get('tmp_path');

		// Rename the file with custom name
		if ($this->package_name && ($file != $this->package_name))
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - renaming the download package from $file to " . $this->package_name);
			File::move($tmp_path . '/' . $file, $tmp_path . '/' . $this->package_name);
			$file = $this->package_name;
		}

		// Unpack the downloaded package file
		$package = InstallerHelper::unpack($tmp_path . '/' . $file);

		// Get an installer instance
		$installer = Installer::getInstance();
		$update->set('type', $package['type']);

		$this->originalApp = $this->switchToWatchfulApp();

		// Install the package
		if (($installer->update($package['dir']) === false) && !$this->checkInstall($id))
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - unable to execute the update");
			$this->application->close("COM_JMONITORING_CANT_INSTALL_UPDATE"); // There was an error updating the package
		}

		// replace application
		Factory::$application = $this->originalApp;

		// Quick change
		$this->type = $package['type'];

		// Cleanup the install files
		if (!is_file($package['packagefile']))
		{
			$config                 = Factory::getConfig();
			$package['packagefile'] = $config->get('tmp_path') . '/' . $package['packagefile'];
		}

		InstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);
		$ver = $updaterow->version;
		$updaterow->delete($id);
		ob_clean();
		Watchfulli::debug("WatchfulliActions::doUpdate - update completed ok");
		$this->application->close("ok_" . $ver);
	}

	/**
	 * Custom installer for core updates
	 * Added to fix issues with updating Joomla! 3.4 => 3.5
	 */
	public function doInstallCore()
	{
		$step    = $this->application->input->get('step');
		$updater = new WatchfulliCoreUpdater();
		switch ($step)
		{
			case 'install':
			case 'download':
			case 'step':
			case 'finalise':
			case 'cleanup':
				$updater->$step($this->update_url);
				break;
			default:
				throw new Exception('COM_JMONITORING_UNKNOWN_STEP');
		}
	}

	/**
	 * Clean Joomla cache
	 *
	 * @return boolean
	 */
	public function cleanJoomlaCache()
	{
		if (file_exists(JPATH_PLUGINS . '/system/cachecleaner/helper.php'))
		{
			require_once JPATH_PLUGINS . '/system/cachecleaner/helper.php';
			$params       = json_decode(
				json_encode(
					[
						'purge'         => 2,
						'clean_tmp'     => 2,
						'purge_opcache' => 2,
						'purge_updates' => 2,
					]
				)
			);
			$helper       = new PlgSystemCacheCleanerHelper($params);
			$helper->type = 'button';
			$helper->purgeCache();

			return true;
		}

		$cache = Factory::getCache('');

		return $cache->cache->clean() && $cache->cache->gc();
	}

	public function fileManager()
	{
		$action = $this->application->input->getCmd('action');
		$path   = $this->application->input->getString('path');
		$args   = $this->application->input->get('args', [], 'array');

		$path = JPATH_ROOT . $path;

		// whitelist methods
		$allowed = ['chmod', 'delete', 'read', 'write'];
		if (!in_array($action, $allowed))
		{
			$this->response(
				[
					'task'    => 'fileManager',
					'success' => false,
					'message' => 'COM_JMONITORING_FILE_MANAGER_UNKNOWN_ACTION',
				]
			);

			return false;
		}

		// attempt to take action
		try
		{
			$callback = ['WatchfulliFile', $action];
			array_unshift($args, $path);
			$result = call_user_func_array($callback, $args);
			$this->response(
				[
					'task'    => 'fileManager',
					'success' => true,
					'result'  => $result,
				]
			);
		}
		catch (RuntimeException $e)
		{
			$this->response(
				[
					'task'    => 'fileManager',
					'success' => false,
					'message' => $e->getMessage(),
				]
			);

			return false;
		}
	}

	/**
	 * Check extension update using native updater
	 */
	public function checkExtensionsUpdates()
	{
		$updater = Updater::getInstance();
		$results = $updater->findUpdates(0, 0);

		if (!$results)
		{
			$this->response(
				[
					'task'    => 'checkExtensionsUpdates',
					'success' => false,
					'result'  => '',
				]
			);
		}

		$this->response(
			[
				'task'    => 'checkExtensionsUpdates',
				'success' => true,
				'result'  => '',
			]
		);
	}

	/**
	 * Get parameters from request
	 *
	 * @return stdClass or null
	 */
	private function getExtensionParameters()
	{
		$extParams = $this->application->input->get('extParams', null, 'string');
		if (!$extParams)
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - No extParams!");

			return null;
		}
		Watchfulli::debug("WatchfulliActions::doUpdate - Raw extParams: " . print_r($extParams, true));

		$extParams = json_decode(stripslashes($extParams));
		if (!is_object($extParams))
		{
			Watchfulli::debug("WatchfulliActions::doUpdate - Unable to get a valid object from extParams. Possibly the JSON is broken.");

			return null;
		}
		Watchfulli::debug("WatchfulliActions::doUpdate - Decoded extParams: " . print_r($extParams, true));

		return $extParams;
	}

	/**
	 * Custom installer for JCEPlugins
	 *
	 * @param   int  $id  update id
	 *
	 * @return string
	 */
	private function doInstallJCEPlugins($id)
	{
		$jceHelper = new WatchfulliExtensionsJce();

		jimport('joomla.filesystem.folder');

		if (!$jceHelper->jceIsInstalled())
		{
			return 'COM_JMONITORING_JCE_NOT_INSTALLED';
		}

		if ($this->jce_key != $jceHelper->getJceKey())
		{
			$jceHelper->saveJceKey($this->jce_key);
		}

		return $jceHelper->installJcePlugin($id);
	}

	/**
	 * Manually check if the update has been completed successfully
	 * This is required because some of installer scripts do not return a clear
	 * true / false message
	 *
	 * @param   int  $id  update id
	 *
	 * @return bool true if update is ok
	 */
	private function checkInstall($id)
	{
		jimport('joomla.database.table');

		$updaterow = Table::getInstance('update');
		if (!$updaterow->load($id))
		{
			// If the Id is no longer in the updater table, we can guess that the install went fine
			return true;
		}

		$extension = Table::getInstance('extension');
		$extension->load($updaterow->extension_id);

		$current_version = json_decode($extension->manifest_cache)->version;
		$current_version = str_replace(['FREE', 'PRO'], '', $current_version);
		$updated_version = str_replace(['FREE', 'PRO'], '', $updaterow->version);

		return version_compare($current_version, $updated_version, '>=');
	}

	/**
	 * Some installers always want to be in admin application. Some other send
	 * a redirect after install. To fix all these exceptions, we use our own
	 * application while installing.
	 *
	 * @return CMSApplication the original application object
	 */
	private function switchToWatchfulApp()
	{
		$originalApp = Factory::getApplication();

		// Reset db driver override made by "System - FaLang Database Driver" plugin
		// which prevents normal updates.
		Factory::$database = null;

		if (Watchfulli::joomla()->getShortVersion() == '3.2.0')
		{
			return $originalApp;
		}

		if (($originalApp instanceof AdministratorApplication))
		{
			return $originalApp;
		}

		Factory::$application = new WatchfulliApplication();
		Factory::$application->setOriginalApp($originalApp);

		return $originalApp;
	}

	/**
	 * With this function we just install a package with the passed URL.
	 *
	 * @return void
	 * @todo This is the default behaviour now so it will probably become the
	 *       public method, while "doUpdate" will remain as a wrapper
	 */
	private function doInstall()
	{
		Watchfulli::debug("WatchfulliActions::doInstall - starting");
		if (empty($this->update_url))
		{
			$this->response(
				[
					'task'    => 'install',
					'status'  => 'error',
					'message' => 'COM_JMONITORING_CANT_GET_UPDATE_URL',
				]
			);
		}

		$file = InstallerHelper::downloadPackage($this->update_url, $this->package_name);
		if (!$file)
		{
			$this->response(
				[
					'task'    => 'install',
					'status'  => 'error',
					'message' => 'COM_JMONITORING_CANT_DOWNLOAD_UPDATE',
				]
			);
		}

		try
		{
			$package = $this->unpackFile($file);
		}
		catch (Exception $ex)
		{
			$this->response(
				[
					'task'    => 'install',
					'status'  => 'exception',
					'message' => $ex->getMessage(),
				]
			);
		}
		$installer = Installer::getInstance();
		$originalApp = $this->switchToWatchfulApp();

		if ($installer->install($package['dir']) === false && !Factory::getApplication()->installStatus)
		{
			$this->response(
				[
					'task'    => 'install',
					'status'  => 'error',
					'message' => 'COM_JMONITORING_CANT_INSTALL_UPDATE',
				]
			);
		}

		Factory::$application = $originalApp;
		InstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

		$this->cleanJoomlaCache();

		$message = "ok_" . $installer->manifest->version;

		$this->response(
			[
				'task'    => 'install',
				'status'  => 'success',
				'message' => $message,
			]
		);
	}

	/**
	 * Unpack a given file
	 *
	 * @param   string  $file  the name of the file to unpack
	 *
	 * @return object   a package object
	 */
	private function unpackFile($file)
	{
		if (!$file)
		{
			throw new Exception('COM_JMONITORING_CANT_UNPACK_UPDATE_EMPTY_FILE');
		}

		$tmp_path = Factory::getConfig()->get('tmp_path', JPATH_SITE . '/tmp');
		if (!file_exists($tmp_path))
		{
			throw new Exception('COM_JMONITORING_CANT_UNPACK_UPDATE_WRONG_TMP_PATH');
		}

		// Rename the file with custom name if present
		if ($this->package_name && ($file != $this->package_name))
		{
			File::move($tmp_path . '/' . $file, $tmp_path . '/' . $this->package_name);
			$file = $this->package_name;
		}

		if (!file_exists($tmp_path . '/' . $file))
		{
			throw new Exception('COM_JMONITORING_CANT_UNPACK_UPDATE_MISSING_FILE');
		}

		$package = InstallerHelper::unpack($tmp_path . '/' . $file);
		if (empty($package))
		{
			throw new Exception('COM_JMONITORING_CANT_UNPACK_UPDATE');
		}

		return $package;
	}

	/**
	 * Close the application with a JSON encoded message
	 *
	 * @param   array  $data
	 */
	protected function response($data)
	{
		if (!is_array($data))
		{
			$data = [
				'status'  => 'exception',
				'message' => '$data is not an array',
			];
		}

		$default = [
			'status'         => 'success',
			'message'        => '',
			'joomlaMessages' => $this->application->getMessageQueue(),
		];

		$this->application->close(json_encode(array_merge($default, $data)));
	}

}
