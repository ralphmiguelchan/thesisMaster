<?php
session_start();
include('conn.php');
include '../mailer/class.smtp.php';
require_once('../mailer/class.phpmailer.php');
$sid = $_GET['sid'];
$uid = $_GET['uid'];

$query = "UPDATE submittedforms SET `substatus` = '2' WHERE `sub_id` = '$sid'";
$c = $conn->query($query);
$pid = 0;
$step = 0;
$sidd = 0;
$dmail = 0;
if($c){
	$q9 = "SELECT * FROM submittedforms WHERE `sub_id` = '$sid'";
	$c9 = $conn->query($q9);
	
	while($row = $c9->fetch_assoc()){
		$sidd = $row['step_id'];
		$dmail = $row['user_id'];
	}
	
	$qx = "SELECT * FROM users WHERE `user_id` = '$dmail'";
	$qc = $conn->query($qx);
	$em = "";
	while($row = $qc->fetch_assoc()){
		$em = $row['email'];
	}
	mailme($em);
}else{
	echo mysqli_error($conn);
}

function mailme($email){
	
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
	$mail->AddAddress($email);
	
	$mail->IsHTML(true);
	$mail->Subject    = "Custeez: Submitted Form Declined";
	$mail->Body    = "your submitted form has been declined!";
	
	if(!$mail->Send())
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
		echo "Message sent!";
	}
}
?>