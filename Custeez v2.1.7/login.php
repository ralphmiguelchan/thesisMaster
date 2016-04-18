<?php 
session_start();
include("scripts/conn.php");
if(isset($_POST['submit'])){
$user = $_POST['userName'];
$pass = $_POST['pass'];

$query = "SELECT * FROM users WHERE `username` = '$user' AND `password` = '$pass'";
$result = $conn->query($query);
$id = "";
while($rows = $result->fetch_assoc()){
	$id = $rows["user_id"];
}

if($result-> num_rows > 0){
	$_SESSION["uid"] = $id;
	header("location: user.php");
}

}

if(isset($_SESSION['uid'])){
	header("location: user.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<script src="js/jq.js"></script>
<script src="js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Login</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include("header/headerInitial.html");?>
	<div id="container" class="container">
		<div id="loginDiv" style="margin-top: 10%;">
			<fieldset>
			<legend>Login</legend>
				<form name="loginForm" method="POST">
				
				<label for="userName">Username:</label>
				<input type="text" class="form-control" name="userName" id="userName" /><br>
				
				<label for="pass">Password:</label>
				<input type="password" class="form-control" name="pass" id="pass" /><br>
				
				<a href="register.php">Click here to register</a>
				<br><br>
				<input type="submit" value="Login" id="submit" name="submit" class="btn btn-primary" />
				</form>
			</fieldset>
		</div>
	</div>
</body>
</html>