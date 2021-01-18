<?php
require("classes/class.phpmailer.php");

	$to = "cuongdc@tecapro.com.vn";
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SetLanguage("vn", "");
	$mail->Host = "mail.trungcuong.com"; 
	$mail->Port       = 587;
	$mail->Username = "workandrelax@gmail.com";
	$mail->Password = "bosscuong";
	$mail->From = "workandrelax@gmail.com";
	$mail->FromName = "Do Chi Cuong";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = false;
	//$mail->SMTPDebug  = 2; // errors and messages
	
	$to_array = split(",",$to);
	for ($i=0;$i<count($to_array);$i++)
	{
		$mail->AddAddress($to_array[$i],"");
	}
		$subject = 'dmcRegistration Successful - e-visavietnam.vn' ;
		$message = '
		<div style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
		Dear <strong>11111,</strong><br /><br />
		Thank you for your registration to <a href="http://e-visavietnam.vn" target="_blank" style="color:#0000FF; text-decoration:none;">e-visavietnam.vn</a>!<br /><br />
		This email to confirm that you have registered account successful with us.<br /><br />
		Please return to the <a href="http://e-visavietnam.vn" target="_blank" style="color:#0000FF; text-decoration:none;">e-visavietnam.vn</a> website and login with the email that you have registered.<br /><br />
		Please do not hesitate to contact us if you have any problem!<br /><br />
		----------------------<br /><br />
		Best regards,<br /><br />
		VIETNAM VISA DEPT.<br /><br />
		</div>
		';
	
		$mail->AddReplyTo("","");
		
		$mail->IsHTML(true);
		
		$mail->Subject  =  $subject;
		$mail->Body     =  $message;
		$mail->Body    = $message;
		$mail->AltBody = $message;
	
		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		 
		echo "Message has been sent";

?>