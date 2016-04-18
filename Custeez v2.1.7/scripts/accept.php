<?php
session_start();
include('conn.php');
include '../mailer/class.smtp.php';
require_once('../mailer/class.phpmailer.php');
$sid = $_GET['sid'];
$uid = $_GET['uid'];

$query = "UPDATE submittedforms SET `substatus` = '1' WHERE `sub_id` = '$sid'";
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
	
	
	$q1 = "SELECT * FROM steps WHERE `step_id` = '$sidd'";
	$c1 = $conn->query($q1);
	
	while($row = $c1->fetch_assoc()){
		$pid = $row['process_id'];
		$step = $row['stepNum'];
		
	}
	
	
	$querys = "SELECT * FROM steps WHERE `process_id` = '$pid'";
	$results = $conn->query($querys);
	$num = $results->num_rows;
	
	if($num == $step){
		$q3 = "UPDATE tracker SET `tstatus` = '1' WHERE `process_id` = '$pid' AND `user_id` = '$dmail'";
		$c3 = $conn->query($q3);
	
	}else{
		$stepUpd = $step + 1;
		$q2 = "SELECT * FROM steps WHERE `stepNum` = '$stepUpd' AND `process_id` = '$pid'";
		$c2 = $conn->query($q2);
	
		$stepId = 0;
		while($row = $c2->fetch_assoc()){
			$stepId = $row['step_id'];
		}
	
		$querys = "SELECT * FROM tracker WHERE `user_id` = '$uid' AND `process_id` = '$pid'";
		$results = $conn->query($querys);
	
	
		$q3 = "UPDATE tracker SET `step_id` = '$stepId' WHERE `process_id` = '$pid' AND `user_id` = '$dmail'";
		$c3 = $conn->query($q3);
	
		if($c3){
			echo "KABUTE";
		}
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
	$mail->Subject    = "Custeez: Submitted Form Accepted";
	$mail->Body    = "your submitted form has been accepted!";
	
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