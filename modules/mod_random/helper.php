<?php

# no direct access

defined('_JEXEC') or die;



class ModRandomHelper {

	

	public static function getServiceName($id)

	{

		if ($id) :



			$db = JFactory::getDbo();

			$query = $db->getQuery(true);

			$query->select('title');

			$query->from('#__services_items');

			$query->where('id = ' . $id);

			$db->setQuery($query->__toString());

			$title = $db->loadResult();

			

		endif;



		return $title;

    }

	

	public function getLinky($title) {

		

		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		

		$query->select('id');

		$query->from('#__menu');

		$query->where("title = '" . $title . "'");

		

		$db->setQuery($query->__toString());

		$itemid = $db->loadResult();



		$linky = JURI::base() . substr( JRoute::_( 'index.php?&Itemid=' . $itemid ), strlen( JURI::base( true ) ) +1 );

		

		return $linky;

	}



	public static function getRandom() {

		

		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		

		$option = JRequest::getVar('option');

		$tables = array(0 => '#__project_items', 1 => '#__services_items');		

		$table  = $option == 'com_project' ? '#__services_items' : ($option == 'com_services' ? '#__project_items' : $tables[rand(0, 1)]);



		$query->select('*');

		$query->from($table);	



		$query->where('state = 1');

		$query->order('RAND()');



		$db->setQuery($query->__toString(), 0, 1);

		$rows = $db->loadObjectList();

		

		$list = array();

		

		foreach($rows as $row) {

			if($table == '#__project_items') {

				$linky = JURI::base() . substr( JRoute::_( 'index.php?option=com_project&view=article&id=' . $row->id . ':' . JFilterOutput::stringURLSafe($row->title) . '&Itemid=105'), strlen( JURI::base( true ) ) +1 );

				$image = $row->cover;

			} else {

				$linky = ModRandomHelper::getLinky($row->title);

				$image = $row->image;

			}

			$list = array(

				'title' => $row->title,

				'link'  => $linky,

				'tags'  => ($table == '#__project_items' ? explode(',', $row->service) : array()),

				'text'  => $row->intro,

				'image' => $image

			);

		}

		

		return $list;

	}

}