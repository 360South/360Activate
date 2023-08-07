<?php
# no direct access
defined('_JEXEC') or die;

abstract class DisplaysHelper {
	
	public static function stringSafe($string)
    {
        //remove any '-' from the string they will be used as concatonater
        $str = str_replace('-', ' ', $string);
		$str = str_replace('_', ' ', $string);

        // remove any duplicate whitespace, and ensure all characters are alphanumeric
        $str = preg_replace(array('/\s+/','/[^A-Za-z0-9\-]/'), array('-', ''), $str);

        // lowercase and trim
        $str = trim(strtolower($str));
        return $str;
    }
	
	public static function getTemplate()
	{
		
		$app 		= JFactory::getApplication();
		$menu 		= $app->getMenu();
		$active 	= $menu->getActive();
		$params 	= new JRegistry;
		
		$params->loadString($active->params);
		$id = $params->get('catid');

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__displays_items');
		$query->where('id = ' . $id);
		$db->setQuery($query->__toString());
		$template = $db->loadResult();
	
		return self::stringSafe( $template );

    }

	public function getLinky($title) {
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('id');
		$query->from('#__menu');
		$query->where("title = '" . $title . "'");
		$query->where('published = 1');
		
		$db->setQuery($query->__toString());
		$itemid = $db->loadResult();

		$linky = JURI::base() . substr( JRoute::_( 'index.php?&Itemid=' . $itemid ), strlen( JURI::base( true ) ) +1 );
		
		return $linky;
	}
	
	public static function getTitle($id) {
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('s.title');
			$query->from($db->quoteName('#__displays_items', 's'));
			$query->join('INNER', $db->quoteName('#__menu', 'm') . ' ON (' . $db->quoteName('s.title') . ' = ' . $db->quoteName('m.title') . ')');
			$query->where('m.id = ' . $id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();

			return $rows;
		endif;
				
    }
	
	public static function getIntro($id) {
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('s.body');
			$query->from($db->quoteName('#__displays_items', 's'));
			$query->join('INNER', $db->quoteName('#__menu', 'm') . ' ON (' . $db->quoteName('s.title') . ' = ' . $db->quoteName('m.title') . ')');
			$query->where('m.id = ' . $id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;	
			
    }
	
	public static function getImage($id) {
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('s.image2');
			$query->from($db->quoteName('#__displays_items', 's'));
			$query->join('INNER', $db->quoteName('#__menu', 'm') . ' ON (' . $db->quoteName('s.title') . ' = ' . $db->quoteName('m.title') . ')');
			$query->where('m.id = ' . $id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;	
			
    }
	
	public static function getPrevNext()
	{
		
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$id     = JRequest::getVar('Itemid'); 
		
		$query->select('*');
		$query->from('#__menu');
		$query->where('link = "index.php?option=com_displays&view=details"');
		$query->where('published = 1');
		$query->order('lft desc');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
				
		$i=0;
		$all = array();
		foreach($rows as $row) : 
			$all[$i] = $row->id;
			$i++;
		endforeach;
		
		$count = count($all);
		
		if ($count > 1) :
		
			function get_next($c, $a) {
				$count = count($a);
				foreach($a as $k => $b) {
					if ($c == $b) {
						if ($k == 0) {
							return $a[$count - 1];
						} else {
							return $a[$k - 1];
						}
					}
				}
			}

			function get_prev($c, $a) {
				$count = count($a);
				foreach($a as $k => $b) {
					if ($c == $b) {
						if ($k == $count - 1) {
							return $a[0];
						} else {
							return $a[$k + 1];
						}
					}
				}
			}
			
			#echo '<pre>';print_r($id);echo '</pre>';
			
			$links[0]->title = DisplaysHelper::getTitle( get_prev( $id, $all) );
			$links[0]->link  = JRoute::_( 'index.php?&Itemid=' . get_prev( $id, $all) );
			$links[0]->intro = DisplaysHelper::getIntro( get_prev( $id, $all) );
			$links[0]->image = DisplaysHelper::getImage( get_prev( $id, $all) );
			
			$links[1]->title = DisplaysHelper::getTitle( get_next( $id, $all) );
			$links[1]->link  = JRoute::_( 'index.php?&Itemid=' . get_next( $id, $all) );
			$links[1]->intro = DisplaysHelper::getIntro( get_next( $id, $all) );
			$links[1]->image = DisplaysHelper::getImage( get_next( $id, $all) );
			
		endif;

		return $links;

	}
	
	public static function getAddons($catid) {
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__addons_items');
		$query->where('id in ('.$catid.')');
		$query->where('state = 1');
		$query->order('ordering');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
				
    }
	
}

