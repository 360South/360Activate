<?php
# no direct access
defined('_JEXEC') or die;

abstract class ProjectHelper
{
	public static function getShares()
	{
		$html = '';
		
		$html .= '<h2>Share</h2>';
		$html .= '<ul class="share-list">';
		$html .= '	<li> <a class="fa fa-facebook" target="_blank" onClick="fbShare(\'' . JURI::current() . '\');"></a> </li>';
		$html .= '	<li> <a class="fa fa-twitter" target="_blank" onClick="twitterShare(\'' . JURI::current() . '\');"></a> </li>';
		//$html .= '	<li> <a class="fa fa-linkedin" target="_blank" onClick="linkedinShare(\'' . JURI::current() . '\');"></a> </li>';
		$html .= '</ul>';
				
		return $html;
    }
	
	public static function getAuthorName( $author_id ) {
		if ($author_id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery( true );
			$query->select( 'title' );
			$query->from( '#__profiles_items' );
			$query->where( 'id = ' . $author_id );
			$db->setQuery( $query->__toString() );
			$author_name = $db->loadResult();
	
			return $author_name;
		endif;		
    }
	
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
		
			# create link
			$query->clear();
			$query->select('id');
			$query->from('#__menu');
			$query->where('title = "'.$title.'"');
			$db->setQuery($query->__toString());
			$Itemid = $db->loadResult();
		
			$result = '<a href="'.JRoute::_('index.php?option=com_services&Itemid='.$Itemid).'">'.$title.'</a>';
			
		endif;

		return $result;
    }
	
	public static function getServiceName2($id)
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
	
	public static function getSector()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, title');
		$query->from('#__project_sectors');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		return $rows;
    }
	
	public static function getService()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, title');
		$query->from('#__services_items');
		$query->where('state = 1');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		return $rows;
    }
	
	public static function getTitle($id)
	{
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('title');
			$query->from('#__project_items');
			$query->where('id = ' . $id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;		
    }
	
	public static function getImage($id)
	{
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('cover');
			$query->from('#__project_items');
			$query->where('id = ' . $id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;		
    }
	
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
		
		$id = JRequest::getVar('id');
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__project_items');
		$query->where('id = ' . $id);
		$db->setQuery($query->__toString());
		$template = $db->loadResult();
	
		return self::stringSafe( $template );

    }
	
	public static function getPrevNext()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$user 	= JFactory::getUser();
		
		$id = JRequest::getVar('id');
				
		$query->select('*');
		$query->from('#__project_items');
		if ($user->id > 0) :
			$query->where('(state = 2 OR state = 1)');
		else :
			$query->where('state = 1');
		endif;
		$query->order('date desc');
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
			function get_next($current,$a) {
				while(true){
					if ($current == $a[1]) {
						return $a[2];
					};
					array_push($a, array_shift($a));
				};
			}
			function get_prev($current, $a) {
				while (true) {
					if ($current == $a[1]) {
						return $a[0];
					};
					array_push($a, array_shift($a));
				};
			}

			$links[0]->title = ProjectHelper::getTitle( get_prev( $id, $all) );
			$links[0]->link  = JRoute::_( 'index.php?option=com_project&view=article&id=' . get_prev( $id, $all ) . ':' . JFilterOutput::stringURLSafe( ProjectHelper::getTitle( get_prev( $id, $all) ) ) . '&Itemid=105' );
			$links[0]->image = ProjectHelper::getImage( get_prev( $id, $all) );
			
			$links[1]->title = ProjectHelper::getTitle( get_next( $id, $all) );
			$links[1]->link  = JRoute::_( 'index.php?option=com_project&view=article&id=' . get_next( $id, $all ) . ':' . JFilterOutput::stringURLSafe( ProjectHelper::getTitle( get_next( $id, $all) ) ) . '&Itemid=105' );
			$links[1]->image = ProjectHelper::getImage( get_next( $id, $all) );
			
		endif;

		return $links;

	}
}