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
<div id="arrow" class="arrow bounce"></div>
<div class="user-container" id="container">
<img alt="custeez" src="img/custeez2.jpg" style="width: 100%;">

<div class="row">
	<div class="detail-box col-md-4">
		<div class="detail-title">
			Custeez
		</div>
		<div class="detail-content">
			<p>Customized Processes and Customized Forms Creator</p>
		</div>
	</div>
	<div class="detail-box-inverse col-md-4">
		<div class="detail-title">
			Customized Form
		</div>
		<div class="detail-content">
			<p>The website allows you to create your own forms for your needs similar to Google Forms or Formstack.</p>
		</div>
	</div>
	<div class="detail-box col-md-4">
		<div class="detail-title">
			Customized Processes
		</div>
		<div class="detail-content">
			<p>The website allows you to create your own process for your needs.</p>
		</div>
	</div>
</div>
</div>
</body>
</html>