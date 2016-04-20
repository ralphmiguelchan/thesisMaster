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
<script src="js/form.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="js/treee.js"></script>
<script src="js/trees.js"></script>
  
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
<title>Custeez Form List</title>
<link rel="stylesheet" href="js/tree/dist/themes/default/style.min.css" />
<link href="css/ui.easytree.css" rel="stylesheet" class="skins" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
<link href="css/bootstrap-switch.css" rel="stylesheet">

</head>
<body>

<?php include ('header/headerUser.html');?>

<div id="container" class="user-container">

<ul class="nav nav-tabs">
	<li id="dashTab" class="hvr-overline-reveal"><a href="dashboard.php">Dashboard</a></li>
	<li id="editorTab" class="active"><a data-toggle="tab" href="#maker">Editor</a></li>
	<li id="reportsTab" class="hvr-overline-reveal"><a href="summary.php">Reports</a></li>
	<li id="findUseTab" class="hvr-overline-reveal"><a href="user.php">Find &amp; Use</a></li>
</ul>

  <div class="tab-content">
    <div id="maker" class="tab-pane fade in active col-sm-12" style="display: flex;">
      <div id="sideBar" class="col-sm-3" style="height:auto;">

<?php if(isset($_GET['pid'])){

	
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-dash btn-resized" style="margin:0;" data-toggle="modal" data-target="#addStep">Add Step</button>';
echo '<br><br><a href="editor.php"><button type="button" class="btn btn-primary btn-resized" style="margin:0;">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['sid'])){
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-dash btn-resized" style="margin:0;">Add Form</button>';
echo '<br><br><a href="editor.php?pid='.$pid.'"><button type="button" class="btn btn-primary btn-resized" style="margin:0;">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['fid'])){
	
}else{
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-dash btn-resized" data-toggle="modal" data-target="#addProc" style="margin:0;">Add Process</button>';
echo '<br><br><button type="button" class="btn btn-dash btn-resized" data-toggle="modal" data-target="#addGroup" style="margin:0;">Add Group</button><br><br>';

echo '</fieldset>';
echo "<fieldset>
<legend>Folders</legend>";
include("hey.php");
}
?>
</div>

<div id="main" class="col-sm-9">
<div class="col-sm-12"><br>
<fieldset><legend>Form List</legend>
<label for="searchForm">Search:</label>
<input type="text" id="searchForm" class='form-control' name="searchForm" /><br><br>
<legend>Result</legend><br>
<div id="res">
<div class="row">
</div>
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

<?php include("footer/footer.html");?>
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
        <label for="procName" id="procName" required="required">Process Name:</label>
        <input type="text" class="form-control" name="procName" />
        <label for="procDetails" id="procDetails" required="required">Process Details:</label>
        <input type="text" class="form-control" name="procDetails" /><br>
         <label for="publicity">Private:</label>
          <div class="form-group" style="height:30px;">
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
       </form>
       <button type="button" class="btn btn-primary" id="addProcBtn">Save</button>
        <button type="button" class="btn btn-primary" id="addProcBtn2">Save &amp; Add Another</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addExistingForm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Existing Form</h4>
      </div>
      <div class="modal-body">
      
      <div id="formLists" style="overflow:auto; height:200px">
      <div class="row">
      
      <div class='col-sm-3 heh'>
      <center>
      <span>Form Name</span>
      <br><span>From Details</span>
      <img src="img/forms.png" width="70" /><br>
      <a href="viewform.php?sid=1">View</a> | <a href="">Use</a>
      </div>
</center>
      </div>
      </div>
      
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
        <label for="procName" required="required">Group Name:</label>
        <input type="text" class="form-control" name="groupname" />
        <label for="procDetails" required="required">Group Details:</label>
        <input type="text" class="form-control" name="groupdetails" /><br>
        <label for="publicity">Private:</label>
          <div class="form-group" style="height:30px;">
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        
       </form>
       <button type="button" class="btn btn-primary" id="addGroupBtn">Save</button>
              <button type="button" class="btn btn-primary" id="addGroupBtn2">Save &amp; Add Another</button>
       
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
           <input type="radio" class="form-control" value="1" id="publicity" name="publicity">Public
           <input type="radio" class="form-control" value="2" id="publicity" name="publicity">Private
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