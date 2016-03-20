<?php 
session_start();
include("scripts/conn.php");
if(isset($_POST['submit'])){
$user = $_POST['userName'];
$pass = $_POST['pass'];
$email = $_POST['email'];

	$query = "SELECT * FROM users WHERE `username`='$user'";
	$c = $conn->query($query);
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
<title>Custeez Registration</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<?php include("header/headerInitial.html");?>

	<div id="container" class="container">
		<div id="loginDiv">
			<fieldset>
			<legend>Register as User</legend>
			<form name="loginForm" method="POST">
			
			<label for="userName">Username:</label>
			<input type="text" class="form-control" name="userName" id="userName" />
			<label for="pass">Password:</label>
			<input type="password" class="form-control" name="pass" id="pass" />
			<label for="email">Email:</label>
			<input type="text" class="form-control" name="email" id="email" /><br>
			
			<input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary" />
			</form>
			<div id="res">
			<?php 
			if(isset($_POST['submit'])){
				if($c->num_rows > 0){
				echo "Username already exists!";
				} else {
					$q = "INSERT into users(username,password,email)VALUES('$user','$pass','$email')";
					$cs = $conn->query($q);
					
					if($cs){
						echo "Registered successfully!<br><a href='login.php'> Click here to login</a>";	
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