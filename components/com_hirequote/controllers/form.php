<?php
/**
 * @version     1.0.0
 * @package     com_hirequote
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Form list controller class.
 */
class HirequoteControllerForm extends HirequoteController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Form', $prefix = 'HirequoteModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public static function getService()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__services_items');
		$query->where('state = 1');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();

		return $rows;
    }
    public static function getAddons()
	{
		$addons = array(
	                array (
	                    "slug" => "stands",
	                    "title" => "Stands"
	                ),
	                array (
	                    "slug" => "animation",
	                    "title" => "Animation"
	                ),
	                array (
	                    "slug" => "props",
	                    "title" => "Props"
	                ),
	                array (
	                    "slug" => "flightcase",
	                    "title" => "Flightcase"
	                ),
	                array (
	                    "slug" => "scent",
	                    "title" => "Scent"
	                ),
	                array (
	                    "slug" => "social-media-hood",
	                    "title" => "Social Media Hood"
	                ),
	                array (
	                    "slug" => "interactivity",
	                    "title" => "Interactivity"
	                ),
	                array (
	                    "slug" => "control",
	                    "title" => "Control"
	                )

	    );

		return $addons;
    }
	public static function getHolographicDispalys()
	{
		$holographicDispalys = array(
			                array (
			                    "slug" => "holo-fan",
			                    "title" => "Holo Fan"
			                ),
			                array (
			                    "slug" => "hd3",
			                    "title" => "HD3"
			                ),
			                array (
			                    "slug" => "pop3",
			                    "title" => "POP3"
			                ),
			                array (
			                    "slug" => "xl3",
			                    "title" => "XL3"
			                ),
			                array (
			                    "slug" => "xxl3",
			                    "title" => "XXL3"
			                ),
			                array (
			                    "slug" => "diamond",
			                    "title" => "Diamond"
			                ),
			                array (
			                    "slug" => "holocube",
			                    "title" => "Holocube"
			                ),
			                array (
			                    "slug" => "deepframe",
			                    "title" => "Deepframe"
			                )
		);

		return $holographicDispalys ;
    }
	public function adminEmail($emailto) {

		$session = JFactory::getSession();

		$path     = JPATH_COMPONENT . "/views/email/tmpl/";
		$fp       = fopen($path . "admin.html", "r");
		$fsize    = filesize($path . "admin.html");
		$message  = fread($fp, $fsize);
		fclose($fp);

		$config       = JFactory::getConfig();
		$sitename     = $config->get('sitename');
		$subject      = $sitename . ': Hire Quote Form';

		$holographicDispalys = $this->getHolographicDispalys();
		$holographicDispalyEmails = array();

		foreach($holographicDispalys as $item) :
			if($session->get($item['slug']) != '') :
				$holographicDispalyEmails[] = $item['title'];
			endif;
		endforeach;

		$addons = $this->getAddons();
	    $addonsEmails = array();

		foreach($addons as $item) :
			if($session->get($item['slug']) != '') :
				$addonsEmails[] = $item['title'];
			endif;
		endforeach;


		//Prepare Data
		$message = str_replace("{holographicDispaly}",  implode(', ', $holographicDispalyEmails), $message);
		$message = str_replace("{addons}",  implode(', ', $addonsEmails), $message);
		$message = str_replace("{subject}",   $subject,                      $message);

		$message = str_replace("{machine}",    $session->get('machine'),       $message);
		$message = str_replace("{address}",    $session->get('address'),       $message);
		$message = str_replace("{activation}",    $session->get('activation'),       $message);
		$message = str_replace("{budget}",    $session->get('budget'),       $message);
		$message = str_replace("{aboutyou}",    $session->get('aboutyou'),       $message);

		$message = str_replace("{name}",      $session->get('name'),         $message);
		$message = str_replace("{company}",   $session->get('company'),      $message);
		$message = str_replace("{phone}",     $session->get('phone'),        $message);
		$message = str_replace("{email}",     $session->get('email'),        $message);
		$message = str_replace("{website}",   $session->get('website'),      $message);
		$message = str_replace("{other}",   $session->get('other'),      $message);
		$message = str_replace("{ipaddress}",   $session->get('ipaddress'),      $message);



		$emailfromname = $sitename;
		$emailfrom     = $config->get('mailfrom');

		$mail = JFactory::getMailer();

		$mail->isHTML( true );
		$mail->Encoding = 'base64';
		$mail->addRecipient( $emailto );
		$mail->addReplyTo( $emailfrom, $session->get( 'name' ) );
		$mail->addBcc( '360@360south.com.au');
		$mail->setSender( array( $emailfrom, $session->get('name') ) );
		$mail->setSubject( $subject );
		$mail->setBody( $message );

		return $mail->Send();

	}

	public function insertData() {

		date_default_timezone_set( 'Australia/Melbourne' );

		$session = JFactory::getSession();

		$holographicDispalys = $this->getHolographicDispalys();
		$holographicDispalyEmails = array();

		foreach($holographicDispalys as $item) :
			if($session->get($item['slug']) != '') :
				$holographicDispalyEmails[] = $item['title'];
			endif;
		endforeach;

		$addons = $this->getAddons();
	    $addonsEmails = array();

		foreach($addons as $item) :
			if($session->get($item['slug']) != '') :
				$addonsEmails[] = $item['title'];
			endif;
		endforeach;


		$column = array(
			'holographicDispaly'  => implode(', ', $holographicDispalyEmails),
			'addons'  => implode(', ', $addonsEmails),
			'machine'      => $session->get('machine'),
			'address'      => $session->get('address'),
			'activation'      => $session->get('activation'),
			'budget'    => $session->get('budget'),
			'aboutyou'      => $session->get('aboutyou'),
			'date'      => date( 'Y-m-d H-i-s' ),
			'name'      => $session->get('name'),
			'company'   => $session->get('company'),
			'phone'     => $session->get('phone'),
			'email'     => $session->get('email'),
			'website'   => $session->get('website'),
			'other'      => $session->get('other'),
			'ipaddress'      => $session->get('ipaddress'),
		);

		$db    = JFactory::getDBO();
		$query = $db->getQuery( true );
		$query->clear();
		$query->insert( $db->qn( '#__hirequote_data' ) )
		      ->columns( $db->qn( array_keys( $column ) ) )
		      ->values( implode( ',', $db->q( $column ) ) );
		$db->setQuery( $query )->execute();

		return true;
	}

	public function submit() {

		$post = $_POST;

		$session = JFactory::getSession();

		foreach( $post as $key => $item ) :
			$session->set( $key, $item );
		endforeach;

		$this->insertData();

		$emailto = 'enquiries@360activate.com.au';

		if($this->adminEmail($emailto)) :
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_hirequote&view=form&id=1:thank-you&Itemid='.JRequest::getVar('Itemid')), strlen(JURI::base(true))+1);


			$session->clear('holographicDispaly');
			$session->clear('addons');
			$session->clear('machine');
			$session->clear('address');
			$session->clear('activation');
			$session->clear('budget');
			$session->clear('aboutyou');
			$session->clear('date');
			$session->clear('name');
			$session->clear('company');
			$session->clear('phone');
			$session->clear('email');
			$session->clear('website');
			$session->clear('other');
			$session->clear('ipaddress');

			JFactory::getApplication()->redirect($linky);
		else :
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_hirequote&view=form&id=2:error&Itemid='.JRequest::getVar('Itemid')), strlen(JURI::base(true))+1);
			JFactory::getApplication()->redirect($linky);
		endif;

	}
}