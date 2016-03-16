<?php 
session_start();
session_destroy();
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
      <li ><a href="index.php">Home</a></li>
     <li class="active"> <a href="login.php">Login</a></li>
     <li> <a href="guest.php">Guest</a></li>
     <li> <a href="register.php">Register</a></li>
       <li  > <a href="faq.php">Info</a></li>
    </ul>
  </div>
</nav>
<center>
<div class="jumbotron" >
<h1>Successfully Loggged Out</h1>
<p>Click <a href="login.php">here </a> to go to login page</p>
</div>
</center>
</div>
</body>
</html>