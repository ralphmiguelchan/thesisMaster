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
<title>Custeez Home</title>
<link rel="stylesheet" href="js/tree/dist/themes/default/style.min.css" />
<link href="css/ui.easytree.css" rel="stylesheet" class="skins" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
</style>
</head>
<body>
<?php include("header/headerUser.html");?>

<div id="container" class="container">
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
		    <div id="jstree" style="height:350px;">
		        <ul>
		            <li class="isFolder">
		                <a href="listform.php">Forms</a>
		                <ul id="forms">
		                </ul>
		            </li>
		        </ul>
		    </div>
	    </div>
	    <div id="main" style="overflow:auto;">
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
        <label for="procName">Process Name:</label>
        <input type="text" class="form-control" name="procName" />
        <label for="procDetails">Process Details:</label>
        <input type="text" class="form-control" name="procDetails" />
         <label for="publicity">Process Publicity:</label>
           <input type="radio" class="form-control" value="1" name="publicity">Public
           <input type="radio" class="form-control" value="2" name="publicity">Private
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