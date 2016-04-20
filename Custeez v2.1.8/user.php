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
<script>
var pid = "<?php echo $pid; ?>";
var uid = "<?php echo $uid ?>";
var sid = "<?php echo $sid ?>";
var fid = "<?php echo $fid ?>";

var pname = "<?php echo $name ?>";
var pdesc = "<?php echo $desc ?>";
var ppub = "<?php echo $pub ?>";
</script>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Find &amp; Use</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
</head>
<body>
<?php include("header/headerUser.html");?>
<div id="container" class="user-container">

<ul class="nav nav-tabs">
<li id="dashTab" class="hvr-overline-reveal"><a href="dashboard.php">Dashboard</a></li>
<?php 
if(isset($_SESSION['uid'])){
	echo '<li id="editorTab" class="hvr-overline-reveal"><a href="editor.php">Editor</a></li>';
	echo '<li id="reportsTab" class="hvr-overline-reveal"><a href="summary.php">Reports</a></li>';
}
?>
  <li id="findUseTab" class="active"><a data-toggle="tab" href="#user">Find &amp; Use</a></li>
  </ul>

  <div class="tab-content">
    <div id="user" class="tab-pane fade in active">
	    <div id="main row" style="width: 95%;">
	    	<fieldset>
	    	<br>
	    	<div class="col-sm-1"></div>
	    	<div class="col-sm-10"><legend>Search</legend>
	    	<input type="text" name="searchBar" class="form-control" id="searchBar" placeholder="Input Keyword Here..." />
	    	</div>
	    	<div class="col-sm-12">
	    	<?php include("search.php"); ?>
	    	</div>
	    	</fieldset>

		</div>
    </div>
</div>

<?php include("footer/footer.html");?>
</body>
</html>