<?php
/**
 * @version     1.0.0
 * @package     com_requestquote
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
class RequestquoteControllerForm extends RequestquoteController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Form', $prefix = 'RequestquoteModel')
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

	public function adminEmail($emailto) {

		$session = JFactory::getSession();

		$path     = JPATH_COMPONENT . "/views/email/tmpl/";
		$fp       = fopen($path . "admin.html", "r");
		$fsize    = filesize($path . "admin.html");
		$message  = fread($fp, $fsize);
		fclose($fp);

		$config       = JFactory::getConfig();
		$sitename     = $config->get('sitename');
		$subject      = $sitename . ': Contact Form';

		$projects = $this->getService();
		$projectEmails = array();

		foreach($projects as $item) :

			$slug = JFilterOutput::stringURLSafe($item->title);

			if($session->get($slug) != '') :

				$projectEmails[] = $item->title;

			endif;

		endforeach;

		//Prepare Data
		$message = str_replace("{subject}",   $subject,                      $message);
		$message = str_replace("{name}",      $session->get('name'),         $message);
		$message = str_replace("{email}",     $session->get('email'),        $message);
		$message = str_replace("{phone}",     $session->get('phone'),        $message);
		$message = str_replace("{projects}",  implode(', ', $projectEmails), $message);
		$message = str_replace("{company}",   $session->get('company'),      $message);
		$message = str_replace("{website}",   $session->get('website'),      $message);
		$message = str_replace("{hear}",   	  $session->get('hear'),      $message);
		$message = str_replace("{budget}",    $session->get('budget'),       $message);
		$message = str_replace("{timeframe}", $session->get('timeframe'),    $message);
		$message = str_replace("{project}",   $session->get('project'),      $message);
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

		$projects = $this->getService();
		$projectEmails = array();

		foreach($projects as $item) :

			$slug = JFilterOutput::stringURLSafe($item->title);

			if($session->get($slug) != '') :

				$projectEmails[] = $item->title;

			endif;

		endforeach;

		$column = array(
			'date'      => date( 'Y-m-d H-i-s' ),
			'name'      => $session->get('name'),
			'email'     => $session->get('email'),
			'phone'     => $session->get('phone'),
			'company'   => $session->get('company'),
			'website'   => $session->get('website'),
			'hear'   	=> $session->get('hear'),
			'projects'  => implode(', ', $projectEmails),
			'budget'    => $session->get('budget'),
			'timeframe' => $session->get('timeframe'),
			'project'   => $session->get('project'),
			'ipaddress'   => $session->get('ipaddress'),
		);

		$db    = JFactory::getDBO();
		$query = $db->getQuery( true );
		$query->clear();
		$query->insert( $db->qn( '#__requestquote_data' ) )
		      ->columns( $db->qn( array_keys( $column ) ) )
		      ->values( implode( ',', $db->q( $column ) ) );
		$db->setQuery( $query )->execute();

		return true;
	}
	
    public function submitClient($post){
	
		## setup API
		$api_key 	= '14C10292983D48CE86E1AA1FE0F8DDFE';
		$acc_key 	= '97D6FB2C72004856B7EF6B2726242EF1';
	
		## INSERT CONTACT INTO WFM
		## Client data must match the format required by WorkflowMax
		## currently accepts XML data
		## see: https://www.workflowmax.com/api/client-methods#POST%20add
				
		## setup request
		$xml = new SimpleXMLElement("<Client></Client>");
        $xml->addChild('Name', htmlspecialchars($post['company']));
        $xml->addChild('Email', htmlspecialchars($post['email']));
        $xml->addChild('Phone', htmlspecialchars($post['phone']));
        $xml->addChild('WebSite', htmlspecialchars($post['website']));
        $xml->addChild('ReferralSource', htmlspecialchars($post['hear']));
        $xml->addChild('IsProspect', 'No');
        $xml->addChild('AccountManagerID', '556880');
        $contacts 	= $xml->addChild('Contacts');
        	$contact 	= $contacts->addChild('Contact');
				$contact->addChild('Name', htmlspecialchars($post['name']));
				$contact->addChild('IsPrimary', 'Yes');
				$contact->addChild('Phone', htmlspecialchars($post['phone']));
				$contact->addChild('Email', htmlspecialchars($post['email']));
		
		#echo $xml->asXML();
		#echo '<pre>';print_r( $xml );echo '</pre>';

        ## post request
		$url	= 'https://api.workflowmax.com/client.api/add?apiKey=' . $api_key . '&accountKey=' . $acc_key;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml->asXML());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: text/xml',
			'Content-Length: ' . strlen($xml->asXML()))
        );
        $output = curl_exec($ch);
		if(curl_error($ch)) :
			 $error_msg = curl_error($ch);
		endif;
        curl_close($ch);
		$result = simplexml_load_string($output);
		
		if($error_msg) :
			echo $error_msg;
			die();
		else :
			return $result;
		endif;
	}
	
	
	public function submitLead($clientid,$post){
		
		#echo '<pre>';print_r($clientid);echo '</pre>';
		#die();		
		
		## setup API
		$api_key 	= '14C10292983D48CE86E1AA1FE0F8DDFE';
		$acc_key 	= '97D6FB2C72004856B7EF6B2726242EF1';
		
		## INSERT LEAD INTO WFM
		## Lead data must match the format required by WorkflowMax
		## currently accepts XML data
		## see: https://www.workflowmax.com/api/lead-methods#POST%20add
				
		## setup request
		$xml = new SimpleXMLElement("<Lead></Lead>");
        $xml->addChild('Name', htmlspecialchars($post['name']));
        $xml->addChild('Description', htmlspecialchars($post['description']));
        $xml->addChild('ClientID', $clientid);
        $xml->addChild('OwnerID', '556880');
        $xml->addChild('EstimatedValue', htmlspecialchars($post['estimate']));
        $xml->addChild('CategoryID', '39429');
		
		## 360South CategoryID = 39428 
		## 360Activate CategoryID = 39429
		
		#echo $xml->asXML();
		#die();
		#echo '<pre>';print_r( $xml );echo '</pre>';

        ## post request
		$url	= 'https://api.workflowmax.com/lead.api/add?apiKey=' . $api_key . '&accountKey=' . $acc_key;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml->asXML());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: text/xml',
			'Content-Length: ' . strlen($xml->asXML()))
        );
        $output = curl_exec($ch);
		if(curl_error($ch)) :
			 $error_msg = curl_error($ch);
		endif;
        curl_close($ch);
		
		$result = simplexml_load_string($output);
		if ($result) :
			foreach($result->Lead as $k => $v) :
				$leadid = $v->ID;
			endforeach;
			$submitlead = $this->updateLead($leadid,$post);
		else :
			echo 'Something went wrong with WFM..';
			die();
		endif;
		
		if($error_msg) :
			echo $error_msg;
			die();
		endif;
	}
	
	public function updateLead($leadid,$post){
		
		## setup API
		$api_key 	= '14C10292983D48CE86E1AA1FE0F8DDFE';
		$acc_key 	= '97D6FB2C72004856B7EF6B2726242EF1';
		
		## UPDATE LEAD IN WFM
		## Lead data must match the format required by WorkflowMax
		## currently accepts XML data
		## see: https://www.workflowmax.com/api/custom-field-methods#GET%20customfield
				
		## setup request
		$xml = new SimpleXMLElement("<CustomFields></CustomFields>");
		
        $customfields = $xml->addChild('CustomField');
			$customfields->addChild('ID', '254939'); ## project type
			$customfields->addChild('Text', $post['type']);
        $customfields = $xml->addChild('CustomField');
			$customfields->addChild('ID', '255088'); ## timeframe
			$customfields->addChild('Text', $post['timeframe']);
        $customfields = $xml->addChild('CustomField');
			$customfields->addChild('ID', '196177'); ## prospect
			$customfields->addChild('Text', 'Unverified');
		
		#echo $xml->asXML();
		#echo '<pre>';print_r( $xml );echo '</pre>';
		#die();
		
		## post request
		$url	= 'https://api.workflowmax.com/lead.api/update/'.$leadid.'/customfield?apiKey=' . $api_key . '&accountKey=' . $acc_key;
		
		/*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml->asXML());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: text/xml',
			'Content-Length: ' . strlen($xml->asXML()))
        );
        $output = curl_exec($ch);
		if(curl_error($ch)) :
			 $error_msg = curl_error($ch);
		endif;
        curl_close($ch);*/
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml->asXML());
        $output = curl_exec($ch);
		if(curl_error($ch)) :
			 $error_msg = curl_error($ch);
		endif;
        curl_close($ch);
		
		$result = simplexml_load_string($output);
		
		if($error_msg) :
			echo $error_msg;
			die();
		endif;
		
		#echo '<pre>';print_r( $result );echo '</pre>';
		#die();
		
	}

	public function submit() {

		$post = $_POST;

        $session = JFactory::getSession();

		foreach( $post as $key => $item ) :
			$session->set( $key, $item );
		endforeach;

		$captcha 	= $post['g-recaptcha-response'];
		$secret = '6LccwS8UAAAAAEF1lq8lc7Y6Wsmnol1EWtQBmQHm';
		$gVerifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha);
		$captcha_response = json_decode($gVerifyResponse);


		if (!$captcha_response->success) {
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_requestquote&view=form&id=3:error&Itemid='.JRequest::getVar('Itemid')), strlen(JURI::base(true))+1);
			JFactory::getApplication()->redirect( $linky );
			die;
		} else {
			$this->insertData();
			$emailto = 'enquiries@360activate.com.au';
			if($this->adminEmail($emailto)) :
		
				## insert contact into WFM
				## get project data
				$projects = $this->getService();
				$projectEmails = array();

				foreach($projects as $item) :
					$slug = JFilterOutput::stringURLSafe($item->title);
					if($session->get($slug) != '') :
						$projectEmails[] = $item->title;
					endif;
				endforeach;
				$projectType = implode(', ',$projectEmails);

				## setup budget estimate
				$budgetArr = explode(' - ',$post['budget']);
				$budget = preg_replace('/[^0-9]/', '',$budgetArr[1]).'000';
				$post['estimate'] = $budget;

				## setup description
				$post['description'] = $post['project'];
				$post['type']		 = $projectType;
				$post['timeframe']	 = $post['timeframe'];

				## insert client and lead into WFM
				$result = $this->submitClient($post);
				#echo '<pre>';print_r($result);echo '</pre>';
				#die();

				if ($result) :
					foreach($result->Client as $k => $v) :
						$clientid = $v->ID;
					endforeach;
					$submitlead = $this->submitLead($clientid,$post);		
				else :
					echo 'Something went wrong with WFM..';
					die();
				endif;

				$session->clear('name');
				$session->clear('email');
				$session->clear('phone');
				$session->clear('company');
				$session->clear('website');
				$session->clear('hear');
				$session->clear('budget');
				$session->clear('timeframe');
				$session->clear('project');

                $linky = JURI::base().substr(JRoute::_('index.php?option=com_requestquote&view=form&id=1:thank-you&Itemid='.JRequest::getVar('Itemid')), strlen(JURI::base(true))+1);
				JFactory::getApplication()->redirect($linky);
				#die();

			else :

				$linky = JURI::base().substr(JRoute::_('index.php?option=com_requestquote&view=form&id=2:error&Itemid='.JRequest::getVar('Itemid')), strlen(JURI::base(true))+1);

				JFactory::getApplication()->redirect($linky);

			endif;

		}
	}
}
?>