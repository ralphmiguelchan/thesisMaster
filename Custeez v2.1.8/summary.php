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
 
 <script src="js/treee.js"></script>
  <script src="js/treeees.js"></script>

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
<title>Custeez Home</title>
<link rel="stylesheet" href="js/tree/dist/themes/default/style.min.css" />
<link href="css/ui.easytree.css" rel="stylesheet" class="skins" type="text/css" />
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
		echo '<li id="reportsTab" class="active"><a href="#summary">Reports</a></li>';
	}
	?>
	  <li id="findUseTab" class="hvr-overline-reveal"><a href="user.php">Find &amp; Use</a></li>
</ul>

  <div class="tab-content"> 
    <div id="summary" class="tab-pane fade in active" style="display: flex;">
	    <div id="sideBar" class="col-sm-3">
		    <div id="jstree" style="height:100%;">
		        <ul>
		            <li class="isFolder">
		                <a href="listform.php">Forms</a>
		                <ul id="forms">
		                </ul>
		            </li>
		        </ul>
		    </div>
	    </div>
	    <div id="main" class="col-sm-9"style="overflow:auto;">
		    <h1 id="formt">No Form Selected</h1>
		    <div class="input-group">
			    <span class="input-group-addon">
			    
			    <select id="heads">
			    
			    
			    </select>
			    
			    </span>
			    <input type="text" class="form-control" id="search" name="search" />
			    <span class="input-group-addon" id="cn">0</span>
		    </div>
			<table class="table">
			    <thead>
			      <tr id="header">
			       
			      </tr>
			    </thead>
			    <tbody id="datum">
			    <tr>
			    <td>
			    </tr>
			    </tbody>
		  </table>
    	</div>
	</div>
    </div>
    
</div>

 

</body>
</html>