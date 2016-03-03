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
<!DOCTYPE HTML>
<html>
<head>
<script src="js/jq.js"></script>
<script src="js/b.js"></script>
<script src="js/main.js"></script>
<script src="dist/sweetalert.min.js"></script> 
<script src="js/dash.js"></script> 
<script src="js/forms.js"></script> 
<script src="js/group.js"></script> 

<!-- for the toggle switch -->
<!-- <link href="css/bootstrap-switch.css" rel="stylesheet"> -->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="js/bootstrap-switch.js"></script> -->
<!-- <script src="js/jquery.min.js"></script> -->
<!-- <link href="css/highlight.css" rel="stylesheet"> -->
<!-- <link href="css/main.css" rel="stylesheet"> -->
<!-- <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet"> -->

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
<li><a href="dashboard.php">Dashboard</a></li>
<li class="active"><a data-toggle="tab" href="#maker">Editor</a></li>
<li><a href="user.php">Find & Use</a></li>
  
  </ul>

  <div class="tab-content" style="height: 100%;">
    <div id="maker" class="tab-pane fade in active">
      <div id="sideBar">
      <div class='col-sm-1'></div>
      <div class='col-sm-11'><br>

<?php if(isset($_GET['pid'])){

	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addStep">Add Step</button>';
echo '<br><br><button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addExistingForm">Add Existing Form</button>';

echo '<br><br><a href="editor.php"><button type="button" class="btn btn-primary btn-resized">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['sid'])){
	echo "<fieldset><legend>Add</legend>";
echo '<a href="editor.php?pid='.$pid.'"><button type="button" class="btn btn-primary btn-resized">Back</button></a>';

echo '</fieldset>';
}else if(isset($_GET['fid'])){
	
}else{
	echo "<fieldset><legend>Add</legend>";
echo '<button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addProc">Add Process</button>';
echo '<br><br><button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addGroup">Add Group</button><br><br>';

echo '</fieldset>';
echo "<fieldset>
<legend>Folders</legend>";
echo '<a href="listproc.php"><button type="button" class="btn btn-primary btn-resized">Processes</button></a>';

echo '<br><br><a href="listform.php"><button type="button" class="btn btn-primary btn-resized">Forms</button></a>';
echo '<br><br><a href="listgroup.php"><button type="button" class="btn btn-primary btn-resized">Groups</button></a>';

}

?>
</div>
</div>


<div id="main">
<div id='ginto'>

</div>
<div class="col-sm-1"></div>
<div class="col-sm-10"><br>
<fieldset>
<legend>


<?php if(isset($_GET['pid'])){
echo "<span id='pname'>Process: ".$name."</span><br>";
echo "<span id='pdesc'>Description:".$desc."</span>";
echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProc" style="margin: 15px;">Edit</button>';
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
        <label for="procName" required="required">Process Name:</label>
        <input type="text" class="form-control" name="procName" />
        <label for="procDetails" required="required">Process Details:</label>
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
        <input type="text" class="form-control" name="groupdetails" />
         <label for="publicity">Group Publicity:</label>
				<!-- toggle switch -->
	         	<!-- <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-id-switch-state bootstrap-switch-animate bootstrap-switch-off" style="width: 108px;height:5%;">
		         	<div class="bootstrap-switch-container" style="width: 159px; margin-left: -53px;">
			         	<span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 53px;">ON</span>
			         	<span class="bootstrap-switch-label" style="width: 53px;">&nbsp;</span>
			         	<span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 53px;">OFF</span>
			         	<input id="switch-state" type="checkbox" checked="">
		         	</div>
	         	</div> -->

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
        <input type="hidden" name="fid" id="fid" />
        
       </form>
       <button type="button" class="btn btn-primary" id="addStepBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addStep2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Step</h4>
      </div>
      <div class="modal-body">
       <form name="addStepForm2" id="addStepForm2" method="POST">
        <label for="stepName">Step Name:</label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
        <input type="hidden" name="fid" id="fid" />
        
       </form>
       <button type="button" class="btn btn-primary" id="addStepBtn2">Save</button>
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