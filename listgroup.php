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
<script src="js/b.js"></script>
<script src="js/main.js"></script>
<script src="dist/sweetalert.min.js"></script> 
<script src="js/dash.js"></script> 
<script src="js/groups.js"></script>
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
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
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
      <li ><a href="user.php">Home</a></li>
     <li> <a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<ul class="nav nav-tabs">
<li><a data-toggle="tab" href="#dashboard">Dashboard</a></li>
<li class="active"><a data-toggle="tab" href="#maker">Editor</a></li>
<li><a href="user.php">User</a></li>
  
  </ul>

  <div class="tab-content">
       <div id="dashboard" class="tab-pane fade">
    <fieldset><legend>Notifications</legend>
    <?php include("notif.php"); ?>
    </fieldset>
    <fieldset>
<legend>Process Notifications</legend>
<div id="pendproc">
<div class="row">



</div>
</div>
</fieldset>	

<fieldset>
<legend>Approved/Declined</legend>
<div id="appdecform">
<div class="row"></div>
</div>
</fieldset>
    </div>
   
    <div id="maker" class="tab-pane fade in active">
      <div id="sideBar">

<?php if(isset($_GET['pid'])){

	
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addStep">Add Step</button>';
echo '<br><br><a href="editor.php"><button type="button" class="btn btn-primary btn-resized">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['sid'])){
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-primary btn-resized">Add Form</button>';
echo '<br><br><a href="editor.php?pid='.$pid.'"><button type="button" class="btn btn-primary btn-resized">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['fid'])){
	
}else{
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addProc">Add Process</button>';
echo '<br><br><button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addGroup">Add Group</button>';

echo '</fieldset>';
echo "<fieldset>
<legend>Folders</legend>";
echo '<a href="listproc.php"><button type="button" class="btn btn-primary btn-resized">Processes</button></a>';
echo '<br><br><a href="listform.php"><button type="button" class="btn btn-primary btn-resized">Forms</button></a>';
echo '<br><br><a href="listgroup.php"><button type="button" class="btn btn-primary btn-resized">Groups</button></a>';

}
?>
</div>


<div id="main">
<fieldset><legend>Process List</legend>
<label for="searchProc">Search:</label>
<input type="text" id="searchProc" class='form-control' name="searchProc" /><br>
<legend>Result</legend>
<div id="res">
<div class="row">

</div>
</div>
<fieldset>
<legend>

<?php if(isset($_GET['pid'])){
echo "<span id='pname'>Process: ".$name."</span><br>";
echo "<span id='pdesc'>Description:".$desc."</span>&nbsp;";
echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProc">Edit</button>';
}else if(isset($_GET['sid'])){
	echo "<span id='sname'>Step: ".$name."</span>&nbsp;";
	echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStep">Edit</button>';
}

?>

</legend>
<?php if(isset($_GET['pid'])){
include("steps.php");
}else if(isset($_GET['sid']) || isset($_GET['fid'])){
	include("formmaker.php");
}

?>

</fieldset>

</div>


</div>
</div>
</div>


<!--  MODALS  -->


<!-- Add Process -->
<div id="addProc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Process</h4>
      </div>
      <div class="modal-body">
       <form name="addProcForm" id="addProcForm" method="POST">
        <label for="procName">Process Name:</label>
        <input type="text" class="form-control" name="procName" />
        <label for="procDetails">Process Details:</label>
        <input type="text" class="form-control" name="procDetails" />
         <label for="publicity">Process Publicity:</label>
           <input type="radio" class="form-control" value="1" name="publicity">Public</input>
           <input type="radio" class="form-control" value="2" name="publicity">Private</input>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
       </form>
       <button type="button" class="btn btn-primary" id="addProcBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="addGroup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Group</h4>
      </div>
      <div class="modal-body">
       <form name="addGroupForm" id="addGroupForm" method="POST">
        <label for="procName">Group Name:</label>
        <input type="text" class="form-control" name="groupname" />
        <label for="procDetails">Group Details:</label>
        <input type="text" class="form-control" name="groupdetails" />
         <label for="publicity">Group Publicity:</label>
           <input type="radio" class="form-control" value="1" name="publicity">Public</input>
           <input type="radio" class="form-control" value="2" name="publicity">Private</input>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        
       </form>
       <button type="button" class="btn btn-primary" id="addGroupBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="editProc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Process</h4>
      </div>
      <div class="modal-body">
       <form name="editProcForm" id="editProcForm" method="POST">
        <label for="procName">Process Name:</label>
        <input type="text" class="form-control" id="procName" name="procName" />
        <label for="procDetails">Process Details:</label>
        <input type="text" class="form-control" id="procDetails" name="procDetails" />
        <label for="publicity">Process Publicity:</label>
           <input type="radio" class="form-control" value="1" id="publicity" name="publicity">Public</input>
           <input type="radio" class="form-control" value="2" id="publicity" name="publicity">Private</input>
        <input type="hidden" class="form-control" id="procId" name="procId" />
       </form>
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="editProcBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addStep" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Step</h4>
      </div>
      <div class="modal-body">
       <form name="addStepForm" id="addStepForm" method="POST">
        <label for="stepName">Step Name:</label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
       </form>
       <button type="button" class="btn btn-primary" id="addStepBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editStep" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Step</h4>
      </div>
      <div class="modal-body">
       <form name="editStepForm" id="editStepForm" method="POST">
        <label for="stepName">Step Name:</label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
       </form>
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="editStepBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--  END MODALS -->


</body>
</html>