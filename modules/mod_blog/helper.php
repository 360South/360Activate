<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_events
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_events
 *
 * @package     Joomla.Site
 * @subpackage  mod_events
 * @since       1.5
 */
class ModBlogHelper {
	public static function getPosts() {
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__blog_items');
		$query->where('state = 1');	
		$query->order('date desc');
		
		$db->setQuery($query->__toString(), 0, 4);
		$rows = $db->loadObjectList();
		
		return $rows;
		
	}
	
}
