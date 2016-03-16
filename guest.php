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
<script src="js/b.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Home</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<style>


.colored{
background-color:black;
color:white;
}
.colorednav{
background-color:black;
border-color:black;
}
#loginDiv{
margin: 0 auto;
width:350px;
}
</style>
</head>
<body>

<div id="container">


<nav class="navbar navbar-default colorednav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Custeez</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
     <li> <a href="login.php">Login</a></li>
     <li class="active"> <a href="guest.php">Guest</a></li>
       <li> <a href="register.php">Register</a></li>
       <li> <a href="faq.php">Info</a></li>
    </ul>
  </div>
</nav>

<div id="loginDiv">
<fieldset>
<legend>Login</legend>
<form name="loginForm" method="POST">

<label for="email">Email:</label>
<input type="text" class="form-control" name="email" id="email" /><br>
<label for="password">Password:</label>	
<input type="password" class="form-control" name="password" id="password" /><br>
<input type="submit" value="Login" id="submit" name="submit" class="btn btn-primary" />
</form>
<legend>Generate</legend>

<form name="loginForm" method="POST">

<label for="gueste">Email:</label>
<input type="text" class="form-control" name="gueste" id="gueste" /><br>
<label for="guestid">Your Name:</label>
<input type="text" class="form-control" name="guestid" id="guestid" /><br>
<input type="submit" value="Generate" id="generate" name="generate" class="btn btn-primary" />
</form>
<div id="generated">
<?php 

if(isset($_POST['generate'])){
	if($id == ""){
		echo "Empty email.";	
	}else{
		$query = "SELECT * FROM users WHERE email = '$id'";
		$c = $conn->query($query);
		
		if($c->num_rows > 0){
			echo "Guest already exists.";
		}else{
			$query = "INSERT into users (username,email,password)VALUES('$na','$id','$uniq')";
			$c = $conn->query($query);
			mailme($id,$na,$uniq);
			echo "Generated ID: " .$uniq;
		}
	}
}

?>
</div>
</fieldset>
</div>



</div>
</body>
</html>