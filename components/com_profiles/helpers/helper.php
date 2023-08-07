<?php
# no direct access
defined('_JEXEC') or die;


abstract class ProfilesHelper
{
	public static function vCard($items) {

		require_once JPATH_COMPONENT.'/assets/class_vcard.php';

		$contacts = ProfilesHelper::getContacts();
	
		// Instantiate a new vcard object.
		$vc = new vcard();

		foreach($items as $item) {
			
			$split      = explode(' ', $item->title);
			$first_name = $split[0];
			$last_name  = $split[1];
			
			$address = explode(',', $contacts[0]->address);
			
			$vc->data['first_name']       = $first_name;
			$vc->data['last_name']        = $last_name;
			$vc->data['company']          = $contacts[0]->name;
			$vc->data['title']            = $item->position;
			$vc->data['work_address']     = $address[0];
			$vc->data['work_city']        = $contacts[0]->country;
			$vc->data['work_state']       = $contacts[0]->state;
			$vc->data['work_postal_code'] = $contacts[0]->postcode;
			$vc->data['office_tel']       = $contacts[0]->telephone;
			$vc->data['cell_tel']         = $item->mobile;
			$vc->data['email1']           = $item->email;
			$vc->data['url']              = JURI::base().substr(JRoute::_('index.php?option=com_profiles&view=details&id='.$item->id.':'.JFilterOutput::stringURLSafe($item->title).'&Itemid=104'),strlen(JURI::base(true))+1);
			$vc->data['photo']            = JURI::base().$item->image; 
		
		}

		//$vc->download();

	}
	
	public static function getContacts()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
				
		$query->select('*');
		$query->from('#__contact_details');
		$query->where('published=1');
		$db->setQuery($query->__toString(), 0, 1);
		$rows = $db->loadObjectList();

		return $rows;
	
	}
	
	public static function ellipsis($text,$length=100,$options=array()) {
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
	
}
