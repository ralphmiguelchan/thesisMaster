<?php
include 'class.smtp.php';
	require_once('class.phpmailer.php');

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->CharSet="UTF-8";
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = 'ralphmiguelchan@gmail.com';
	$mail->Password = 'iamgod()123;123';
	$mail->SMTPAuth = true;

	$mail->From = 'ralphmiguelchan@gmail.com';
	$mail->FromName = 'Ralph Chan';
	$mail->AddAddress('ralphmiguelchan@gmail.com');

	$mail->IsHTML(true);
	$mail->Subject    = "PHPMailer Test Subject via Sendmail, basic";
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
	$mail->Body    = "Hello";

	if(!$mail->Send())
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
		echo "Message sent!";
	}
?>