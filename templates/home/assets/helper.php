<?php

defined('_JEXEC') or die;

class ModLoginHelper
{
	public static function getIntro()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
		$query->from('#__content');
		$query->where('id = 18');

		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
	}
}

?>