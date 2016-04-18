<?php 
session_start();
include("scripts/conn.php");
include 'mailer/class.smtp.php';
require_once('mailer/class.phpmailer.php');
if(isset($_POST['submit'])){
	$user = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE `email` = '$user' AND `password` = '$password'";
	$result = $conn->query($query);
	$id = "";
	while($rows = $result->fetch_assoc()){
		$id = $rows["user_id"];
	}
	
	if($result-> num_rows > 0){
		$_SESSION["guid"] = $id;
		header("location: user.php");
	}
}
if(isset($_POST['generate'])){
$id = $_POST['gueste'];
$na = $_POST['guestid'];
$uniq = rand(1,9999) ."teez";
}

if(isset($_SESSION['uid'])){
	header("location: user.php");
}

function mailme($email,$name,$x){

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
	$mail->Subject    = "Custeez: Your Guest Details!";
	$mail->Body    = "Your Guest Details<br><p>Name:".$name."</p><p>Password:".$x;

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<script src="js/jq.js"></script>
<script src="js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Guest Login</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include("header/headerInitial.html")?>
	<div id="container" class="container">
	
		<div id="loginDiv" style="margin-top: 10%;">
			<fieldset>
			<legend>Login</legend>
				<form name="loginForm" method="POST">
				
					<label for="email">Email:</label>
					<input type="text" class="form-control" name="email" id="email" /><br>
					
					<label for="password">Password: </label>	
					<input type="password" class="form-control" name="password" id="password" /><br>
					
					<i><a href="guestregsiter.php">click here to generate password</a></i><br><br>
					
					<input type="submit" value="Login" id="submit" name="submit" class="btn btn-primary" />
				</form>
			</fieldset>
		</div>
	</div>
</body>
</html>