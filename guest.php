<?php 
session_start();
include("scripts/conn.php");
if(isset($_POST['submit'])){
	$user = $_POST['guestid'];
	$email = $_POST['email'];
	$query = "SELECT * FROM users WHERE `username` = '$user' AND `email` = '$email'";
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
$id = $_POST['guestid'];
$uniq = uniqid() ."custeez";
}

if(isset($_SESSION['uid'])){
	header("location: user.php");
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
      <a class="navbar-brand" href="#">Custeez</a>
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

<label for="guestid">Generated ID:</label>
<input type="text" class="form-control" name="guestid" id="guestid" /><br>
<label for="userName">Email:</label>	
<input type="text" class="form-control" name="email" id="email" /><br>
<input type="submit" value="Login" id="submit" name="submit" class="btn btn-primary" />
</form>
<legend>Generate</legend>

<form name="loginForm" method="POST">

<label for="guestid">Email:</label>
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
			$query = "INSERT into users (username,email)VALUES('$uniq','$id')";
			$c = $conn->query($query);
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