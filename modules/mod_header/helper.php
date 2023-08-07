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
class ModHeaderHelper {
	
	public static function getCurrentAlias() {
		
	   $menu   = JFactory::getApplication()->getMenu();
	   $active = $menu->getActive();
	   
	   return $active->alias;
	}
	
	public static function getImage($folder) {
		
		$Itemid	 = JRequest::getVar('Itemid');
		$option  = JRequest::getVar('option');
		$view    = JRequest::getVar('view');
		
		$alias = ModHeaderHelper::getCurrentAlias();
		
		if($option == 'com_services' && $view = 'details') {
			$file_name = $alias . '-';
		} else {
			$file_name = '';
		}
		
		$path = '/images/heros/' . $folder . '/';
		
		if (file_exists(JPATH_SITE.$path.'hero-'.$Itemid.'.jpg')) :
			
			$file = $path.'hero-'.$Itemid.'.jpg';
		
		else :
		
			$imagesDir   = JPATH_BASE . $path;

			$images      = glob($imagesDir . $file_name . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
			$randomImage = $images[array_rand($images)];

			if(empty($images)) {
				$images      = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				$randomImage = $images[array_rand($images)];
			}

			$file = $path . str_replace($imagesDir, '', $randomImage);
		
		endif;	
		
		#echo $file.'<br />';
		
		return $file;
	
	}
	
	public static function getPostDate($id) {
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('date');
		$query->from('#__blog_items');
		$query->where('state = 1 and id = ' . $id);	
		
		$db->setQuery($query->__toString());
		$row = $db->loadResult();
		
		return $row;		
	}
	
	public static function getPostTitle($id) {
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__blog_items');
		$query->where('state = 1 and id = ' . $id);	
		
		$db->setQuery($query->__toString());
		$row = $db->loadResult();
		
		return $row;		
	}
	
	public static function getProjectTitle($id) {
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__project_items');
		$query->where('state = 1 and id = ' . $id);	
		
		$db->setQuery($query->__toString());
		$row = $db->loadResult();
		
		return $row;		
	}
	
}