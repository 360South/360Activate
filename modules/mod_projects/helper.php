<?php
# no direct access
defined('_JEXEC') or die;

class ModProjectsHelper {
	
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
	
	public static function getProjects() {
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
		$query->from('#__project_items');
		$query->where('state = 1');
		$query->order('date desc');

		$db->setQuery($query->__toString(),0,5);
		$rows = $db->loadObjectList();
		
		return $rows;
		
	}
}