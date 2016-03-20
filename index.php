<?php 
session_start();
if(isset($_SESSION['uid']) || isset($_SESSION['guid'])){
	header("location: user.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>

<script src="js/jq.js"></script>
<script src="js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Home</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div>
<?php include("header/headerInitial.html");?>
</div>

<div class="container" id="container">

	<div class="jumbotron" >
		<h1>Custeez</h1>
		<p>Customized Processes and Customized Forms Creator</p>
	</div>
	<div class="jumbotron">
		<h1>Customized Processes</h1>
		<p> The website allows you to create your own process for your needs.</p>
	</div>
	<div class="jumbotron">
		<h1>Customized Form</h1>
		<p> The website allows you to create your own forms for your needs similar to Google Forms or Formstack.</p>
	</div>
	<div class="jumbotron">
		<h1>Guest Account</h1>
		<p> A user may create a temporary account that will be removed later on.</p>
	</div>
	
</div>
</body>
</html>