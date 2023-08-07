<?php
/**
 * @version     1.0.0
 * @package     com_careers
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
class CareersControllerForm extends CareersController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Form', $prefix = 'CareersModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	
	public function reCAPTCHA($recaptcha_response) {
		
		$url    = 'https://www.google.com/recaptcha/api/siteverify?secret=6Lc93QYUAAAAADDdE_3U7216ksoDZbb_7sbdZ1k6&response=' . $recaptcha_response;
		$result = file_get_contents($url, false);
		$json   = json_decode($result);

		return $json->success;
	}

	public function submit() {
		
		$db =& JFactory::getDBO();

		$session  = JFactory::getSession();
		$Itemid   = JRequest::getVar('Itemid');
		
		$name	   = urldecode( strip_tags( JRequest::getVar( 'name' ) ) );
		$email	   = urldecode( strip_tags( JRequest::getVar( 'email' ) ) );
		$phone	   = urldecode( strip_tags( JRequest::getVar( 'phone' ) ) );
		$portfolio = urldecode( strip_tags( JRequest::getVar( 'portfolio' ) ) );
		$behance   = urldecode( strip_tags( JRequest::getVar( 'behance' ) ) );
		$position  = urldecode( strip_tags( JRequest::getVar( 'position' ) ) );
		
		$session->set( 'name',      $name );
		$session->set( 'email',     $email );
		$session->set( 'phone',     $phone );
		$session->set( 'portfolio', $portfolio );
		$session->set( 'behance',   $behance );
		
		$query = $db->getQuery( true );
		$query->select( 'title' );
		$query->from( '#__careers_items' );
		$query->where( 'id = ' . $position );
		$db->setQuery( $query->__toString() );
		$title = $db->loadResult();
		
		$emailto 	= 'careers@360south.com.au';
		$subject 	= "360South: Career Form" . ($title ? ' - ' . $title : '');
		
		# email setup
		$emailfromname 	= $name;
		$emailfrom      = $email;
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . $emailfromname . ' <info@360activate.com.au>' . "\r\n";
		$headers .= 'Bcc: 360@360south.com.au' . "\r\n";
		
		# prepare email body text
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>' . $subject . '</title>
		</head>
		<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="300" align="left" valign="top">Name:</td>
			<td align="left" valign="top">' . $name . '</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="left" valign="top">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="300" align="left" valign="top">Email:</td>
			<td align="left" valign="top">' . $email . '</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="left" valign="top">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="300" align="left" valign="top">Phone:</td>
			<td align="left" valign="top">' . $phone . '</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="left" valign="top">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Portfolio:</td>
			<td align="left" valign="top">' . $portfolio . '</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="left" valign="top">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Dribble/Behance:</td>
			<td align="left" valign="top">' . $behance . '</td>
		  </tr>
		</table>
		</body>
		</html>';
		
		$message = rawurldecode( $message );
		$mail    = JFactory::getMailer();
		
		$mail->isHTML( true );
		$mail->Encoding = 'base64';
		$mail->addRecipient( $emailto );
		$mail->addReplyTo( $emailfrom, $emailfromname );
		$mail->addBcc( '360@360south.com.au' );
		$mail->setSender( array( $emailfrom, $emailfromname ) );
		$mail->setSubject( $subject );
		$mail->setBody( $message );

		$sent = $mail->Send();
			
		if($sent) :
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_careers&view=details&id=99:thank-you&Itemid=' . $Itemid), strlen(JURI::base(true)) + 1);
			$session->clear( "name" );
			$session->clear( "phone" );
			$session->clear( "email" );
			$session->clear( "portfolio" );
			$session->clear( "behance" );
			JFactory::getApplication()->redirect( $linky );
		else :
			$linky = JURI::base().substr(JRoute::_('index.php?option=com_careers&view=details&id=98:error&Itemid=' . $Itemid), strlen(JURI::base(true)) + 1);
			JFactory::getApplication()->redirect( $linky );
		endif;	
	}
}