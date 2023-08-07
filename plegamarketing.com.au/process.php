<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Australia/Melbourne');

if ($_POST['email']) :

	## connect to database
	$mysqli = new mysqli("localhost", "activatecom_plega_user", "bzNJuMo)bELs", "activatecom_plega");

	## check connection
	if (mysqli_connect_errno()) :
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	endif;

	## sanitize post
	function filter($data) {
		$data = addslashes(trim(htmlentities(strip_tags($data))));
		return $data;
	};
	foreach($_POST as $key => $value) :
		$data[$key] = filter($value);
	endforeach;

	if ($data['iam-other']) : $data['iam'] = $data['iam-other']; else : $data['iam'] = $data['iam']; endif;

    $secret 			= '6LeKU9gaAAAAAEpJK1AMwWjTo-QXn-lu2r8LxlmU';
    $captcha 			= $data['g-recaptcha-response'];

    $gVerifyResponse 	= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha);
    $captcha_response 	= json_decode($gVerifyResponse);

    #echo '<pre>data';print_r($_POST);echo '</pre>';
    #die();

    if ($captcha_response->success) :

        ## insert into database
        $query = 'INSERT INTO brochures VALUES (NULL, NOW(), "'. $data['fname'] .'","'. $data['sname'] .'","'. $data['mobile'] .'","'. $data['email'] .'","'. $data['organisation'] .'","'. $data['iam'] .'")';

        if ($mysqli->query($query)) :

            ## send email
            require '/home/activatecom/plegamarketing.com.au/PHPMailer/src/Exception.php';
            require '/home/activatecom/plegamarketing.com.au/PHPMailer/src/PHPMailer.php';

            $emailto    = $data['email'];
            $emailname  = $data['fname'] . ' ' . $data['sname'];
            $emailfrom  = 'info@plega.com.au';

            $mail       = new PHPMailer(true);

            //Recipients
            $mail->setFrom($emailto,'Plega Healthcare');
            $mail->addAddress($emailto,$emailname);
            $mail->addReplyTo($emailfrom,'Plega Healthcare');
            #$mail->addCC('');
            $mail->addBCC('360@360south.com.au');

            //Attachments
            $mail->addAttachment('/home/activatecom/plegamarketing.com.au/downloads/PLEGA_HiLo.pdf');
            $mail->addAttachment('/home/activatecom/plegamarketing.com.au/downloads/PLEGA_HOMECARE.pdf');
            $mail->addAttachment('/home/activatecom/plegamarketing.com.au/downloads/PLEGA_SkyeChair.pdf');
            $mail->addAttachment('/home/activatecom/plegamarketing.com.au/downloads/PLEGA_Waverley.pdf');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Plega Healthcare Brochures';
            $mail->Body    = '<p>Thank you again for visiting Plega at todays show.  Please find attached our relevant product brochures.  If you have any further queries, simply click on the link below and we will be sure to get back to you.</p><p>Contact: <a href="https://plega.com.au/contact/enquiry/">https://plega.com.au/contact/enquiry/</a></p><p>Kind regards,<br />Your Plega team</p>';
            $mail->AltBody = 'Thank you again for visiting Plega at todays show.  Please find attached our relevant product brochures.  If you have any further queries, simply click on the link - https://plega.com.au/contact/enquiry/ - and we will be sure to get back to you.';

            //send the message
            if ( $mail->send() ) :

                ## get the id number
                $id = $mysqli->insert_id;
                header('Location: https://www.plegamarketing.com.au/thank-you.html');

            else :

                ## reirect error page
                header('Location: https://www.plegamarketing.com.au/error.html');

            endif; 

        else :

            ## reirect error page
            header('Location: https://www.plegamarketing.com.au/error.html');

        endif;

    else :

        ## reirect home page
        header('Location: https://www.plegamarketing.com.au/index.html?return=true');

    endif;

endif;

?>