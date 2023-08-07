<?php
# no direct access
defined('_JEXEC') or die;

abstract class ProfilesHelper
{
	public static function ellipsis($text,$length=100,$options=array())
	{
		$default = array(
			'ending' => '...', 'exact' => true, 'html' => false
		);
		$options = array_merge($default, $options);
		extract($options);
		if ($html) {
			if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
				return $text;
			}
			$totalLength = mb_strlen(strip_tags($ending));
			$openTags = array();
			$truncate = '';
			preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
			foreach ($tags as $tag) {
				if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
					if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
						array_unshift($openTags, $tag[2]);
					} else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
						$pos = array_search($closeTag[1], $openTags);
						if ($pos !== false) {
							array_splice($openTags, $pos, 1);
						}
					}
				}
				$truncate .= $tag[1];
				$contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
				if ($contentLength + $totalLength > $length) {
					$left = $length - $totalLength;
					$entitiesLength = 0;
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
						foreach ($entities[0] as $entity) {
							if ($entity[1] + 1 - $entitiesLength <= $left) {
								$left--;
								$entitiesLength += mb_strlen($entity[0]);
							} else {
								break;
							}
						}
					}
					$truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
					break;
				} else {
					$truncate .= $tag[3];
					$totalLength += $contentLength;
				}
				if ($totalLength >= $length) {
					break;
				}
			}
		} else {
			if (mb_strlen($text) <= $length) {
				return $text;
			} else {
				$truncate = mb_substr($text, 0, $length - mb_strlen($ending));
			}
		}
		if (!$exact) {
			$spacepos = mb_strrpos($truncate, ' ');
			if (isset($spacepos)) {
				if ($html) {
					$bits = mb_substr($truncate, $spacepos);
					preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
					if (!empty($droppedTags)) {
						foreach ($droppedTags as $closingTag) {
							if (!in_array($closingTag[1], $openTags)) {
								array_unshift($openTags, $closingTag[1]);
							}
						}
					}
				}
				$truncate = mb_substr($truncate, 0, $spacepos);
			}
		}
		$truncate .= $ending;
		if ($html) {
			foreach ($openTags as $tag) {
				$truncate .= '</'.$tag.'>';
			}
		}
		return $truncate;
	}
	
	public static function getContent()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__content');
		$query->where('id = 3');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
    }
	
	public static function getProfiles()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__profiles_items');
		$query->where('state = 1');
		$query->order('ordering');
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
			$query->from('#__profiles_items');
			$query->where('id = '.$id);
			$db->setQuery($query->__toString());
			$rows = $db->loadResult();
	
			return $rows;
		endif;		
    }
	
	public static function getPrevNext()
	{
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$id = JRequest::getVar('id');
				
		$query->select('*');
		$query->from('#__profiles_items');
		$query->where('state = 1');
		$query->order('ordering asc');
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
#				echo '<br />NEXT: current -> '.$current.' a[1] --> '.$a[1];
				while(true){
					if ($current == $a[1]) {
						return $a[2];
					};
					array_push($a,array_shift($a));
				};
			}
			function get_prev($current,$a) {
#				echo '<br />PREV: current -> '.$current.' a[1] --> '.$a[1];
				while (true) {
					if ($current == $a[1]) {
						return $a[0];
					};
					array_push($a,array_shift($a));					
#					echo '<pre>'; print_r($a); echo '</pre>';
				};
			}
						
			$links[0]->previd = get_prev($id,$all);
			$links[0]->nextid = get_next($id,$all);
		
#			echo '<pre>'; print_r($links); echo '</pre>';
			
			return $links;
			
		endif;
		
	}	
}