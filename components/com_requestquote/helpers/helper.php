<?php
# no direct access
defined('_JEXEC') or die;

abstract class RequestquoteHelper
{
	public static function getMyokoHotels()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__accommodation_items');
		$query->where('state = 1');
		$query->where('catid = 1');
		$query->order('ordering asc');
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
		
    }
	
	public static function getService()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title, intro');
		$query->from('#__services_items');
		$query->where('state = 1');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		return $rows;
    }
	
	public static function getPackages()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__packages_items');
		$query->where('state = 1');
		
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
		
    }
	
	public static function getMyokoDates()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('dates');
		$query->from('#__packages_items');
		$query->where('state = 1');
		$query->where('id    = 1');
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		$array = array();
		
		if ($rows) {
			$dates = explode(';', $rows[0]->dates);

			foreach ($dates as $dateArr) {
				$date = explode('^', $dateArr);
				$array[] = $date[0].' - '.$date[1];
			}
		}
		return $array;
    }
	
	public static function getOdysseyDates()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('dates');
		$query->from('#__packages_items');
		$query->where('state = 1');
		$query->where('id    = 2');
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		$array = array();
		
		if ($rows) {
			$dates = explode(';', $rows[0]->dates);

			foreach ($dates as $dateArr) {
				$date = explode('^', $dateArr);
				$array[] = $date[0].' - '.$date[1];
			}
		}
		return $array;
    }
}

