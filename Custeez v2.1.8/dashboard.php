<?php
session_start();
include("scripts/conn.php");
$pid = 0;
$name = "";
$ownerid = "";
$details = "";
$sid = 0;
$uid = 0;
$fid = 0;
$desc = "";
$pub = 0;
if(isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];

		$query = "SELECT * FROM processes WHERE `process_id` = '$pid'";
		$result = $conn->query($query);
		while($row = $result->fetch_assoc()){
			$name = $row['processName'];
			$details = $row['processDetails'];
			$ownerid = $row['owner_id'];
			$desc = $row['processDetails'];
			$pub = $row['pubType_id'];
		}
	}else if(isset($_GET['sid'])){
		$sid = $_GET['sid'];

		$query = "SELECT * FROM steps WHERE `step_id` = '$sid'";
		$result = $conn->query($query);
		while($row = $result->fetch_assoc()){
			$name = $row['stepName'];
			$pid = $row['process_id'];
		}
	}else if(isset($_GET['fid'])){
		$fid = $_GET['fid'];
	}
}else if(isset($_SESSION['guid'])){
	$uid = $_SESSION['guid'];
	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];

		$query = "SELECT * FROM processes WHERE `process_id` = '$pid'";
		$result = $conn->query($query);
		while($row = $result->fetch_assoc()){
			$name = $row['processName'];
			$details = $row['processDetails'];
			$ownerid = $row['owner_id'];
			$desc = $row['processDetails'];
			$pub = $row['pubType_id'];
		}
	}else if(isset($_GET['sid'])){
		$sid = $_GET['sid'];

		$query = "SELECT * FROM steps WHERE `step_id` = '$sid'";
		$result = $conn->query($query);
		while($row = $result->fetch_assoc()){
			$name = $row['stepName'];
			$pid = $row['process_id'];
		}
	}else if(isset($_GET['fid'])){
		$fid = $_GET['fid'];
	}
}else{
	header("location: login.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<script src="js/jq.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="dist/sweetalert.min.js"></script>
<script src="js/dash.js"></script>
<script>
var pid = "<?php echo $pid; ?>";
var uid = "<?php echo $uid ?>";
var sid = "<?php echo $sid ?>";
var fid = "<?php echo $fid ?>";

var pname = "<?php echo $name ?>";
var pdesc = "<?php echo $desc ?>";
var ppub = "<?php echo $pub ?>";
</script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
</head>
<body>
<?php include("header/headerUser.html");?>

<div id="container" class="user-container" style="height: auto;">
	<ul class="nav nav-tabs">
		<li id="dashTab" class="active"><a href="#dashboard">Dashboard</a></li>
		<?php
		if(isset($_SESSION['uid'])){
			echo '<li id="editorTab" class="hvr-overline-reveal"><a href="editor.php">Editor</a></li>';
			echo '<li id="reportsTab" class="hvr-overline-reveal"><a href="summary.php">Reports</a></li>';
		}
		?>
		  <li id="findUseTab" class="hvr-overline-reveal"><a href="user.php">Find &amp; Use</a></li>
	</ul>

  <div class="tab-content">
  	<div class='col-sm-1'></div>
    <div id="dashboard" class="tab-pane fade in active col-sm-10"><br>
	    <fieldset>
	    	<legend>For My Review</legend>
		    <div id="forrev" style="height: 33%;">
		    <?php include("notif.php"); ?>
		    </div>
	    </fieldset>

	    <br><fieldset>
			<legend>My Process/es' Status</legend>
			<div style="height:33%;">
				<div id="pendproc">
					<div class="row"></div>
				</div>
			</div>
		</fieldset>

		<br><fieldset style="height:100%;">
			<legend>My Approved/Declined Forms <button type="button" style="margin:5px;" class="btn btn-danger" onClick="delSelectedSub();">Delete Selected</button></legend>
			<div id="myforms" style="height:34%;">
				<div id="appdecform">
					<div class="row"></div>
				</div>
			</div>
		</fieldset>
	</div>
  </div>
</div>
<script>
var height = $("#forrev").height();
$("#myforms").css("height",height);
</script>

 
</body>
</html>
