<?php
# no direct access
defined('_JEXEC') or die;

abstract class BlogHelper
{
	
	public static function getShares() {
		$html = '';
		
		$html .= '<h4>Share</h4>';
		$html .= '<ul class="share-list">';
		$html .= '	<li> <a class="fa fa-facebook" target="_blank" onClick="fbShare(\'' . JURI::current() . '\');"></a> </li>';
		$html .= '	<li> <a class="fa fa-twitter" target="_blank" onClick="twitterShare(\'' . JURI::current() . '\');"></a> </li>';
		//$html .= '	<li> <a class="fa fa-linkedin" target="_blank" onClick="linkedinShare(\'' . JURI::current() . '\');"></a> </li>';
		$html .= '</ul>';
				
		return $html;
    }
	
	public static function read_time($text) {
        $words = str_word_count( strip_tags( $text) );
    	$min = floor( $words / 200 );
    	if($min === 0){
    		return '1 min read';
    	}
    	return $min . ' min read';
    }
	
	public static function getCategory($catid)
    {
        $id = JRequest::getVar('id');
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__blog_categories');
		$query->where('id = ' . $catid);
		$db->setQuery($query->__toString());
		$title = $db->loadResult();
	
		return $title;
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
	
	public static function getPostDate( $id ) {
		
		if(!$id) :
			$id = JRequest::getVar('id');
		endif;
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('date');
		$query->from('#__blog_items');
		$query->where('state = 1 and id = ' . $id);	
		
		$db->setQuery($query->__toString());
		$row = $db->loadResult();
		
		return $row;		
	}
	
	public static function getAuthorPosition( $author_id ) {
		if ($author_id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery( true );
			$query->select( 'position' );
			$query->from( '#__profiles_items' );
			$query->where( 'id = ' . $author_id );
			$db->setQuery( $query->__toString() );
			$author_name = $db->loadResult();
	
			return $author_name;
		endif;
	}
	
	public static function getAuthor($id)
    {
        $id = JRequest::getVar('id');
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__profile_items');
		$query->where('id = ' . $catid);
		$db->setQuery($query->__toString());
		$title = $db->loadResult();
	
		return $title;
    }
	
	public static function getAuthorImage( $author_id ) {
        if ($author_id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery( true );
			$query->select( 'image' );
			$query->from( '#__profiles_items' );
			$query->where( 'id = ' . $author_id );
			$db->setQuery( $query->__toString() );
			$author_name = $db->loadResult();
	
			return $author_name;
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
		$query->from('#__blog_items');
		$query->where('id = ' . $id);
		$db->setQuery($query->__toString());
		$template = $db->loadResult();
	
		return self::stringSafe( $template );

    }
	
	public static function getCategories()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__blog_categories');
		$query->where('state = 1');
		$query->order('ordering asc');
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
			$query->from('#__blog_items');
			$query->where('id = '.$id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;		
    }
	
	public static function getDate($id)
	{
		
		if ($id) :
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('date');
			$query->from('#__blog_items');
			$query->where('id = '.$id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;		
    }
	
	public static function getImage($id)
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('image');
		$query->from('#__blog_images');
		$query->where('catid = '.$id);
		$query->order('ordering asc');
		$query->where('state = 1');
        $db->setQuery($query->__toString());
		$rows = $db->loadResult();

		return $rows;
		
    }
	
	public static function getImages($id)
	{
				
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__blog_images');
		$query->where('state = 1');
		$query->where('catid = '.$id);
		$query->order('ordering asc');
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
#		echo $query;

		return $rows;
		
    }
	
	public static function getTags($id)
	{
		
		/*$ids = explode(',',$id);

		function build_http_query($query) {
			$query_array = array();
			foreach($query as $key => $key_value):
				$query_array[] = 'find_in_set('.urlencode($key_value).',id)';
			endforeach;
			return implode(' OR ',$query_array);
		}
		$str = build_http_query($ids);*/
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('title');
		$query->from('#__blog_categories');
		$query->where('id in ('.$id.')');
		$query->order('ordering asc');
#		echo $query;
        $db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		$arr = array();
		foreach ($rows as $row) :
			$arr[] = $row->title;
		endforeach;
		
		$result = implode(' / ',$arr);
		
		return $result;

	}
	
	public static function getPrevNext()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$user 	= JFactory::getUser();
		
		$id = JRequest::getVar('id');
				
		$query->select('*');
		$query->from('#__blog_items');
		if ($user->id > 0) :
			$query->where('(state = 2 OR state = 1)');
		else :
			$query->where('state = 1');
		endif;
		$query->order('date desc');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
#		echo '<pre>'; print_r($rows); echo '</pre>';
		
		$i=0;
		$all = array();
		foreach($rows as $row) : 
			$all[$i] = $row->id;
			$i++;
		endforeach;
		
#		echo '<pre>'; print_r($all); echo '</pre>';
		
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

#			$current = array_search($id, $all); 
			$links[0]->title = BlogHelper::getTitle( get_prev( $id, $all) );
			$links[0]->link  = JRoute::_( 'index.php?option=com_blog&view=article&id=' . get_prev( $id, $all ) . ':' . JFilterOutput::stringURLSafe( BlogHelper::getTitle( get_prev( $id, $all) ) ) . '&Itemid=106' );
			$links[0]->date  = BlogHelper::getDate( get_prev( $id, $all) );
			$links[0]->image = 'http://placehold.it/950x450';
			
			$links[1]->title = BlogHelper::getTitle( get_next( $id, $all) );
			$links[1]->link  = JRoute::_( 'index.php?option=com_blog&view=article&id=' . get_next( $id, $all ) . ':' . JFilterOutput::stringURLSafe( BlogHelper::getTitle( get_next( $id, $all) ) ) . '&Itemid=106' );
			$links[1]->date  = BlogHelper::getDate( get_next( $id, $all) );
			$links[1]->image = 'http://placehold.it/950x450';
			
			
		endif;

		return $links;

	}
	
	public static function getTinyURL($url)
	{  
		$ch = curl_init();  
		$timeout = 5;  
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
		$data = curl_exec($ch);  
		curl_close($ch);  
		return $data;  
	}
	
}