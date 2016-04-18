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
$gid = 0;
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
	}else if(isset($_GET['gid'])){
	$gid = $_GET['gid'];
		
		$query = "SELECT * FROM groups WHERE `group_id` = '$gid'";
		$result = $conn->query($query);
		
		while($row = $result->fetch_assoc()){
			$name = $row['groupName'];
			$details = $row['groupDetails'];
		}
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
<script src="js/group.js"></script>
<link href="css/bootstrap-switch.css" rel="stylesheet">
<script src="js/bootstrap-switch.js"></script>
<script>
var pid = "<?php echo $pid; ?>";
var uid = "<?php echo $uid ?>";
var sid = "<?php echo $sid ?>";
var fid = "<?php echo $fid ?>";
var gid = "<?php echo $_GET['gid'] ?>";

var pname = "<?php echo $name ?>";
var pdesc = "<?php echo $desc ?>";
var ppub = "<?php echo $pub ?>";
</script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Custeez Home</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
</style>
</head>
<body>
<?php include ('header/headerUser.html');?>

<div id="container" class="container">

<ul class="nav nav-tabs">
	<li id="dashTab" class="hvr-overline-reveal"><a href="dashboard.php">Dashboard</a></li>
	<li id="editorTab" class="active"><a data-toggle="tab" href="#maker">Editor</a></li>
	<li id="reportsTab" class="hvr-overline-reveal"><a href="summary.php">Reports</a></li>
	<li id="findUseTab" class="hvr-overline-reveal"><a href="user.php">Find &amp;&amp; Use</a></li>
</ul>
   
    
  <div class="tab-content">
    <div id="maker" class="tab-pane fade in active col-sm-12" style="display: flex;">
      <div id="sideBar" class="col-sm-3">

     	 <fieldset><legend>Add</legend>
     	 <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addProc">Add Process</button>
     	 <br><br><a href="editor.php"><button type="button" class="btn btn-primary btn-resized">Back</button></a>
     	 <br><br>
     	 <legend>Manage Members</legend>
     	 <label for="memberSearch">Add:</label>
     	 <input type="text" id="memberSearch" class='form-control' />
     	 <div id="memberadd" style="width:250px; height:100px; overflow:auto;">
     	
     	 </div>
     	 <legend>Members</legend>
     	 <div id="memberlist" style="height:100px; overflow: auto;">
     	 
     	 </div>
     	
     	 <div id="processlist" style="display:none; height:100px; overflow: auto;">
     	 </div>
     	 </fieldset>
     	 </div>


<div id="main" class="col-sm-9">
<div class="col-sm-12"><br>
<fieldset>
<legend>
<span id='tit'>Group Name: <?php echo $name ?></span>&nbsp;<button class='btn btn-primary' style="margin: 15px;" data-toggle="modal" data-target="#editGroup">Edit</button><br>
<span id='desc'>Description: <?php echo $details ?></span><br>

</legend></fieldset></div>
<div class="row">

</div>
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
         <div class="form-group" style="height:30px;">
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
                <input type="hidden" name="gid" value='<?php echo $_GET["gid"]; ?>' />
        
       </form>
       <button type="button" class="btn btn-primary" id="addProcBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editGroup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Group</h4>
      </div>
      <div class="modal-body">
       <form name="editGroupForm" id="editGroupForm" method="POST">
        <label for="procName">Group Name:</label>
        <input type="text" class="form-control" id="procName" value='<?php echo $name; ?>' name="procName" />
        <label for="procDetails">Group Details:</label>
        <input type="text" class="form-control" id="procDetails" value='<?php echo $details; ?>' name="procDetails" />
         <div class="form-group" style="height:30px;">
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" class="form-control" id="procId" value='<?php echo $gid ?>' name="procId" />
       </form>
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="editGroupBtn">Save</button>
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