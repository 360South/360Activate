<?php

/* SETTINGS */
$recipient = "info@360activate.com.au";
$subject = "New Message from Contact Form";

if($_POST){

  /* DATA FROM HTML FORM */
  $name = strip_tags( stripslashes( $_POST['name'] ) );
  $email = strip_tags( stripslashes( $_POST['email'] ) );
  $message = strip_tags( stripslashes( $_POST['message'] ) );

  /* SUBJECT */
  $emailSubject = $subject . " by " . $name;

  /* HEADERS */
  $headers = "From: $name <$email>\r\n" .
             "Reply-To: $name <$email>\r\n" .
             "Bcc: <360@360south.com.au>\r\n" .
             // "Subject: $emailSubject\r\n" .
             "Content-type: text/plain; charset=UTF-8\r\n" .
             "MIME-Version: 1.0\r\n" .
             "X-Mailer: PHP/" . phpversion() . "\r\n";

  /* PREVENT EMAIL INJECTION */
  if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500 Internal Server Error");
  }

  /* MESSAGE TEMPLATE */
  $mailBody = "Name: $name \n\r" .
              "Email:  $email \n\r" .
              "Subject:  $subject \n\r" .
              "Message: $message";

  /* SEND EMAIL */
  mail($recipient, $emailSubject, $mailBody, $headers);
}
?>