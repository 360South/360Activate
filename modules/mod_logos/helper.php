<?php
defined('_JEXEC') or die;

class ModLogosHelper {

	public static function getImages() {

		$path        = '/images/logos/';
		$imagesDir   = JPATH_BASE . $path;
		$images      = glob($imagesDir . '*.{jpg,jpeg,png,gif,svg}', GLOB_BRACE);
		$num         = 10;

		shuffle($images);

		$i=0;foreach($images as $image) :

			if($i < $num) {
				#$images[$i] = $path . str_replace($imagesDir, '', $image);
				$images[$i] = file_get_contents($image);
			} else {
				unset($images[$i]);	
			}

		$i++;endforeach;



		return $images;

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