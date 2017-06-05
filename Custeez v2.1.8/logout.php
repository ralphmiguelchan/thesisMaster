<?php 
session_start();
session_destroy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<script src="js/jq.js"></script>
<script src="js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Logout</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php include('header/headerInitial.html');?>

<div id="container" class="user-container">
<img alt="comeback" src="img/comeback1.jpg" style="width: 100%;">
<center>
<div class="jumbotron" >
<h1>Successfully Loggged Out</h1>
<p>Click <a href="login.php">here </a> to go to login page</p>
</div>
</center>
</div>
 
</body>
</html>