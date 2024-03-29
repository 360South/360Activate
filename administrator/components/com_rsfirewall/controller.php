<?php
/**
 * @package    RSFirewall!
 * @copyright  (c) 2009 - 2020 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

class RsfirewallController extends JControllerLegacy
{
    public function __construct($config = array())
    {
		parent::__construct($config);
		
		// Load stylesheet
        JHtml::_('stylesheet', 'com_rsfirewall/style.css', array('relative' => true, 'version' => 'auto'));

	    if (version_compare(JVERSION, '4.0', '>='))
	    {
		    JHtml::_('stylesheet', 'com_rsfirewall/style40.css', array('relative' => true, 'version' => 'auto'));
	    }
	    else
	    {
		    JHtml::_('stylesheet', 'com_rsfirewall/style30.css', array('relative' => true, 'version' => 'auto'));
	    }

        // Load jQuery from Joomla! 3
        JHtml::_('jquery.framework');
		
		// Load our scripts
        JHtml::_('script', 'com_rsfirewall/rsfirewall.js', array('relative' => true, 'version' => 'auto'));
		
		// load language, english first
		$lang = JFactory::getLanguage();
		$lang->load('com_rsfirewall', JPATH_ADMINISTRATOR, 'en-GB', true);
		$lang->load('com_rsfirewall', JPATH_ADMINISTRATOR, $lang->getDefault(), true);
		$lang->load('com_rsfirewall', JPATH_ADMINISTRATOR, null, true);
		
		// load the frontend language
		// this language file contains some event log translations
		// it's usually loaded by the System Plugin, but if it's disabled, we need to load it here
		if (!JPluginHelper::isEnabled('system', 'rsfirewall'))
		{
			$lang->load('com_rsfirewall', JPATH_SITE, 'en-GB', true);
			$lang->load('com_rsfirewall', JPATH_SITE, $lang->getDefault(), true);
			$lang->load('com_rsfirewall', JPATH_SITE, null, true);
		}
	}
	
	public function acceptModifiedFiles()
	{
		$this->checkToken();
		
		$input = JFactory::getApplication()->input;
		$cid   = $input->get('cid', '', 'array');
		
		$cid = array_map('intval', $cid);
		
		if ($cid)
		{
			$model = $this->getModel('rsfirewall');
			$model->acceptModifiedFiles($cid);
		}
		
		$this->setRedirect('index.php?option=com_rsfirewall', JText::_('COM_RSFIREWALL_HASH_CHANGED_SUCCESS'));
	}
	
	protected function showResponse($success, $data=null)
	{
		$app 		= JFactory::getApplication();
		$document 	= JFactory::getDocument();
		
		// set JSON encoding
		$document->setMimeEncoding('application/json');
		
		// compute the response
		$response = new stdClass();
		$response->success = $success;
		if ($data) {
			$response->data = $data;
		}
		
		// show the response
		echo json_encode($response);
		
		// close
		$app->close();
	}
	
	public function getLatestJoomlaVersion()
	{
		$model = $this->getModel('check');
		$data  = new stdClass();
		if ($response = $model->checkJoomlaVersion())
		{
			$success = true;
			list($data->current, $data->latest, $data->is_latest) = $response;
		} else
		{
			// error
			$success = false;
			$data->message = $model->getError();
		}
		
		$this->showResponse($success, $data);
	}
	
	public function getLatestFirewallVersion()
	{
		$model = $this->getModel('check');
		$data  = new stdClass();
		if ($response = $model->checkRSFirewallVersion())
		{
			$success = true;
			list($data->current, $data->latest, $data->is_latest) = $response;
		}
		else
		{
			// error
			$success = false;
			$data->message = $model->getError();
		}
		
		$this->showResponse($success, $data);
	}
}