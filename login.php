<?php 
session_start();
include("scripts/conn.php");
if(isset($_POST['submit'])){
$user = mysql_real_escape_string($_POST['userName']);
$pass = mysql_real_escape_string($_POST['pass']);

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
      <li ><a href="index.php">Home</a></li>
     <li class="active"> <a href="login.php">Login</a></li>
     <li> <a href="guest.php">Guest</a></li>
       <li  > <a href="faq.php">Info</a></li>
    </ul>
  </div>
</nav>

<div id="loginDiv">
<fieldset>
<legend>Login</legend>
<form name="loginForm" method="POST">

<label for="userName">Username:</label>
<input type="text" class="form-control" name="userName" id="userName" />
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