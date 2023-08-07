<?php
/**
 * @version     1.0.0
 * @package     com_blog
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Blog helper.
 */
class BlogHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_BLOG_TITLE_CITEMS'),
			'index.php?option=com_blog&view=citems',
			$vName == 'citems'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_BLOG_TITLE_ITEMS'),
			'index.php?option=com_blog&view=items',
			$vName == 'items'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_BLOG_TITLE_IITEMS'),
			'index.php?option=com_blog&view=iitems',
			$vName == 'iitems'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_BLOG_TITLE_UPLOADS'),
			'index.php?option=com_blog&view=uploads',
			$vName == 'uploads'
		);

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

		$assetName = 'com_blog';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
