<?php
/**
 * @package    RSFirewall!
 * @copyright  (c) 2009 - 2020 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

class RsfirewallControllerFeed extends JControllerForm
{
	protected function allowAdd($data = array()) {
		$user = JFactory::getUser();
		return $user->authorise('feeds.manage', 'com_rsfirewall');
	}

	protected function allowEdit($data = array(), $key = 'id') {
		$user = JFactory::getUser();
		return $user->authorise('feeds.manage', 'com_rsfirewall');
	}
}