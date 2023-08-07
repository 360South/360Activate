<?php
/**
 * @version     1.0.0
 * @package     com_services
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Services helper.
 */
class ServicesHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_SERVICES_TITLE_ITEMS'),
			'index.php?option=com_services&view=items',
			$vName == 'items'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_SERVICES_TITLE_CITEMS'),
			'index.php?option=com_services&view=citems',
			$vName == 'citems'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_SERVICES_TITLE_UPLOAD'),
			'index.php?option=com_services&view=upload',
			$vName == 'upload'
		);
		/*JHtmlSidebar::addEntry(
			JText::_('COM_SERVICES_TITLE_ILIST'),
			'index.php?option=com_services&view=ilist',
			$vName == 'ilist'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_SERVICES_TITLE_IUPLOAD'),
			'index.php?option=com_services&view=iupload',
			$vName == 'iupload'
		);*/
	}
	
	public static function getParent($catid = '') {
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__services_items');
		$query->where('state = 1 and id ='.$catid);	
		
		$db->setQuery($query->__toString());
		$rows = $db->loadResult();
		
		return $rows;
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_services';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
