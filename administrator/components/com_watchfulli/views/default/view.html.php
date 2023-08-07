<?php
/**
 * @version     admin/views/default/view.html.php 2021-12-12 zanardigit
 * @package     Watchful Client
 * @author      Watchful
 * @authorUrl   https://watchful.net
 * @copyright   Copyright (c) 2012-2023 Watchful
 * @license     GNU/GPL v3 or later
 */

use Akeeba\Engine\Factory;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;
defined('WATCHFULLI_PATH') or die;

class WatchfulliViewDefault extends HtmlView
{
	public function display($tpl = null)
	{
		/** @var \Joomla\CMS\Application\CMSApplication $application */
		$application = \Joomla\CMS\Factory::getApplication();
		$errors      = $this->get('Errors');
		if (!empty($errors))
		{
			throw new Exception(implode('<br />', $errors), 500);
		}

		$this->sitename          = $application->getCfg('sitename');
		$this->style             = "";
		$this->secret_key        = Watchfulli::getToken();
		$this->akeeba_secret_key = WatchfulliHelper::getAkeebaSecretKey();
		$this->debug_mode        = isset($_GET['debug']);
		$this->log_file          = $application->getCfg('log_path') . '/watchfulli.log.php';

		$helper = new WatchfulliHelper();
		$this->firewalls = $helper->getInstalledFirewalls();

		$this->addToolBar();
		parent::display($tpl);
	}

	protected function addToolBar()
	{
		JHTML::stylesheet('administrator/components/com_watchfulli/icon_jmon.css');
		JToolBarHelper::title(JText::_('Watchfulli'), 'icon_jmon');
		JToolBarHelper::preferences('com_watchfulli', $height = '300', $width = '600');
	}

}
