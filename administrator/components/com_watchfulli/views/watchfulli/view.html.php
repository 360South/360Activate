<?php
/**
 * @version     backend/views/watchfulli/view.html.php 2016-11-04 12:13:00 UTC Ch
 * @package     Watchful Client
 * @author      Watchful
 * @authorUrl   https://watchful.net
 * @copyright   Copyright (c) 2012-2019 watchful.li
 * @license     GNU/GPL v3 or later
 */

use Akeeba\Engine\Factory;

defined('_JEXEC') or die;
defined('WATCHFULLI_PATH') or die;

require_once WATCHFULLI_PATH . '/classes/view.php';
require_once WATCHFULLI_PATH . '/classes/watchfulli.php';
require_once WATCHFULLI_PATH . '/classes/helper.php';

class watchfulliViewWatchfulli extends WatchfulliView
{

    public function display($tpl = null)
    {
        $errors = $this->get('Errors');
        if (!empty($errors))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }

        $version = new JVersion;
        if (version_compare($version->getShortVersion(), '3.0.0', '>='))
        {
            $this->sitename = JFactory::getConfig()->get('sitename');
            $this->style = "";
        }
        else
        {
            $this->sitename = JFactory::getConfig()->getValue('config.sitename');
            $this->style = "background-color: #1D6CB0;color: white;border-radius: 4px;text-align: center;padding: 4px 12px;font-size: 13px;line-height: 18px;";
        }

        $this->secret_key = Watchfulli::getToken();

        $this->akeeba_secret_key = WatchfulliHelper::getAkeebaSecretKey();

        $this->debug_mode = isset($_GET['debug']);
        if (Watchfulli::joomla()->RELEASE == '1.5')
        {
            $this->log_file = JFactory::getApplication()->getCfg("log_path") . '/error.php';
        }
        else
        {
            $this->log_file = JFactory::getConfig()->get('log_path') . '/watchfulli.log.php';
        }

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
