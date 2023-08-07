<?php
/**
 * @version     1.0.0
 * @package     com_contactform
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
class ContactformControllerForm extends ContactformController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Form', $prefix = 'ContactformModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	public function insertData() {
		
		date_default_timezone_set('Australia/Melbourne');
		
		$session = JFactory::getSession();
		
		$column = array(
			'date'      => date('Y-m-d H-i-s'),
			'find'      => $session->get('find', ''),
			'findother' => $session->get('findother', ''),
			'findmouth' => $session->get('findmouth', ''),
			'firstname' => $session->get('firstname', ''),
			'lastname'  => $session->get('lastname', ''),
			'email'     => $session->get('email', ''),
			'phone'     => $session->get('phone', ''),
			'body'      => $session->get('body', ''),
		);
		
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->clear();
		$query->insert($db->qn('#__contactform_data'))
		      ->columns($db->qn(array_keys($column)))
		      ->values(implode(',', $db->q($column)));
		$db->setQuery($query)->execute();
		
		return true;
		
	}
	
	public function submit() {

		$secret_key = '6LeuiikTAAAAAE-trFgTBsVmgdiF7v9OzqBVWR-Z';	
		$url        = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . JRequest::getVar('g-recaptcha-response');
		$result     = file_get_contents($url, false);
		$validation = json_decode($result);
		
		$db =& JFactory::getDBO();
	
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__contactform_items');
		$query->where('id = 1');
		$db->setQuery($query->__toString());
		$rows = $db->loadObjectList();
		
		$i = 0;
		$list = array();
		foreach($rows as $row) { 
			$emailto 	= $row->emailto;
			$subject 	= $row->title;
		$i++;
		};
		
		$find		= JRequest::getVar('find');
		$findother	= JRequest::getVar('findother');
		$findmouth	= JRequest::getVar('findmouth');
		$fname 		= urldecode(strip_tags(JRequest::getVar('fname')));
		$lname 		= urldecode(strip_tags(JRequest::getVar('lname')));
		$email		= urldecode(strip_tags(JRequest::getVar('email')));
		$phone		= urldecode(strip_tags(JRequest::getVar('phone')));
		$body		= nl2br(htmlentities(JRequest::getVar('message')));
		
		$session = JFactory::getSession();
		
		$session->set('find',      $find);
		$session->set('findother', $findother);
		$session->set('findmouth', $findmouth);
		$session->set('firstname', $fname);
		$session->set('lastname',  $lname);
		$session->set('email',     $email);
		$session->set('phone',     $phone);
		$session->set('body',      $body);
		
		if ($find == 'Other') :
			$find = 'Other: '.$findother;
		elseif ($find == 'Word of Mouth') :
			$find = 'Word of Mouth: '.$findmouth;
		else :
			$find = $find;
		endif;

		if ($validation->success == 1) :
		
			$this->insertData();
		
			# send an email
			$emailto		= $emailto;
			$emailfrom		= $email;
			$emailfromname	= $name;
			$bcc			= "360@360south.com.au";
			$cc				= "";
			$attachment		= "";
			$subject 		= $subject;
			
			# prepare email body text
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>'. $subject .'</title>
			</head>
			<body>
			<p>'. $body .'</p>
			<hr />
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="300" align="left" valign="top">Name:</td>
				<td align="left" valign="top">'. $fname .' '. $sname .'</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">&nbsp;</td>
				<td align="left" valign="top">&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">Email:</td>
				<td align="left" valign="top">'. $email .'</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">&nbsp;</td>
				<td align="left" valign="top">&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">Phone:</td>
				<td align="left" valign="top">'. $phone .'</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">&nbsp;</td>
				<td align="left" valign="top">&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left" valign="top">How did you hear about us:</td>
				<td align="left" valign="top">'. $find .'</td>
			  </tr>
			</table>
			</body>
			</html>';
			
			$message 	= rawurldecode($message);
			$mail 		= JFactory::getMailer();
			
			$mail->isHTML(true);
			$mail->Encoding = 'base64';
			$mail->addRecipient($emailto);
			$mail->addReplyTo($emailto,'Powder Recon');
			$mail->addBcc('360@360south.com.au');
			$mail->setSender(array($emailfrom,$emailfromname));
			$mail->setSubject($subject);
			$mail->setBody($message);
			$mail->addAttachment($attachment);
				
			$sent = $mail->Send();
			
			if($sent) :
				$linky = JURI::base().substr(JRoute::_('index.php?option=com_contactform&view=form&id=1:thank-you&Itemid='.JRequest::getVar('Itemid')),strlen(JURI::base(true))+1);
				$session->clear("find");
				$session->clear("findother");
				$session->clear("findmouth");
				$session->clear("fname");
				$session->clear("lname");
				$session->clear("email");
				$session->clear("phone");
				$session->clear("body");
				JFactory::getApplication()->redirect( $linky );
			else :
				$linky = JURI::base().substr(JRoute::_('index.php?option=com_contactform&view=form&id=2:error&Itemid='.JRequest::getVar('Itemid')),strlen(JURI::base(true))+1);
				JFactory::getApplication()->redirect( $linky );
			endif;
		else :
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_contactform&view=form&id=3:code-error&Itemid='.JRequest::getVar('Itemid')),strlen(JURI::base(true))+1);
			JFactory::getApplication()->redirect( $linky );	
		endif;
		
	}
}