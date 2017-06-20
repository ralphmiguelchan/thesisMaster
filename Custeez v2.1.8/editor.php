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
$pnm = "";
$gr = "none";
$rgid = 0;
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
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="dist/sweetalert.min.js"></script>
<script src="js/dash.js"></script>
<script src="js/forms.js"></script>
<script src="js/treee.js"></script>
<script src="js/trees.js"></script>
<script src="js/group.js"></script>
<script src="js/bootstrap-switch.js"></script>

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
<title>Custeez Form Editor</title>
<link rel="stylesheet" href="js/tree/dist/themes/default/style.min.css" />
<link href="css/ui.easytree.css" rel="stylesheet" class="skins" type="text/css">
<link rel="stylesheet" type="text/css" href="css/jqu-min.css">
<link rel="stylesheet" href="css/bootstrap-switch.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include("header/headerUser.html");?>
<script type="text/javascript">
$("#firstImg").css("height","80px");
</script>

<div id="container" class="user-container" style="height:1000px;">
	<ul class="nav nav-tabs">
		<li id="dashTab" class="hvr-overline-reveal"><a href="dashboard.php">Dashboard</a></li>
		<li id="editorTab" class="active"><a href="#maker">Editor</a></li>
		<li id="reportsTab" class="hvr-overline-reveal"><a href="summary.php">Reports</a></li>
		<li id="findUseTab" class="hvr-overline-reveal"><a href="user.php">Find &amp; Use</a></li>
	</ul>
	<div class="tab-content">
	    <div id="maker" class="tab-pane fade in active col-sm-12" style="display: flex;">
	      <div id="sideBar" class="col-sm-3" style="height: 950px;">
	      	<div class="col-sm-11"><br>
				<?php if(isset($_GET['pid'])){

					echo "<fieldset><legend>Add</legend>";
				echo '<button type="button" class="btn btn-success btn-resized" data-toggle="modal" data-target="#addStep" style="margin:0;">Add Step</button>';
				echo '<br><br><button type="button" class="btn btn-success btn-resized" data-toggle="modal" data-target="#addExistingForm" style="margin:0;">Add Existing Form</button>';

				echo '<br><br><a href="editor.php"><button type="button" class="btn btn-warning btn-resized">Back</button></a>';

				echo '</fieldset>';
				}else if(isset($_GET['sid'])){
					echo "<fieldset><legend>Add</legend>";
				echo '<a href="editor.php?pid='.$pid.'"><button type="button" class="btn btn-warning btn-resized">Back</button></a>';

				echo '</fieldset>';
				}else if(isset($_GET['fid'])){

				}else{
					echo "<fieldset><legend>Add</legend>";
				echo '<button type="button" class="btn btn-success btn-resized" data-toggle="modal" data-target="#addProc" style="margin:0;">Add Process</button>';
				echo '<br><br><button type="button" class="btn btn-success btn-resized" data-toggle="modal" data-target="#addGroup" style="margin:0;">Add Group</button><br><br>';

				echo '</fieldset>';
				echo "<fieldset>
				<legend>Folders</legend>";
				include("hey.php");
				}

				?>
			</div>
		</div>


			<div id="main" class="col-sm-9" style="height: auto;">
				<div id='ginto'>

				</div>
				<div class="col-sm-12"><br>
					<fieldset>
					<legend>
					<?php if(isset($_GET['pid'])){
						$pd = $_GET['pid'];
					echo "<span id='pname'>Process: ".$name."</span><br>";
					$g = "SELECT * FROM processes WHERE `process_id` = '$pd'";
					$r = $conn->query($g);
					$d = 0;
					while($s = $r->fetch_assoc()){
						$d = $s['group_id'];
					}

					$h = "SELECT * FROM groups WHERE `group_id` = '$d'";
					$v = $conn->query($h);
					$gr = "none";
					while($b = $v->fetch_assoc()){
						$gr = $b['groupName'];
					}
					echo "<span id='pdesc'>In the Group: ".$gr."</span><br>";
					echo "<span id='pdesc'>Description:".$desc."</span>";
					echo '<button type="button" class="btn btn-primary" data-toggle="modal" onClick="editBtn()" style="margin: 15px;">Edit</button>';
					}else if(isset($_GET['sid'])){



						$q = "SELECT * FROM processes WHERE `process_id` = '$pid'";
						$r = $conn->query($q);
						$rgid = 1;
						if($q){
							while($test = $r->fetch_assoc()){
								$pnm = $test['processName'];
								$rgid = $test['rgid'];
							}
						}

						echo "<span id='pdesc'>Process Name: ".$pnm."</span><br>";
						echo "<span>In the Group: ".$gr."</span><br>";
						echo "<span>RGID: ".$rgid."</span><br>";
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
        <label for="procName" id="procName" required="required">Process Name:</label>
        <input type="text" class="form-control" id="procName" name="procName" />
        <label for="procDetails" id="procDetails" required="required">Process Details:</label>
        <input type="text" class="form-control" id="procDetails" name="procDetails" /><br>
         <label for="publicity">Private:</label>
          <div class="form-group" style="height:30px;">
          <script>
          	$("#publicity").onText('Private');
          	$("#publicity").offText('Public');
          	$("#publicity").on('success');
          </script>
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-on-color="success" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
       </form>
       <button type="button" class="btn btn-success" id="addProcBtn">Save</button>
        <button type="button" class="btn btn-primary" id="addProcBtn2">Save &amp; Add Another</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

      <div id="formLists" style="overflow:auto;height:400px;">
      <div class="row">

      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        <label for="procName" required="required">Group Name: </label>
        <input type="text" class="form-control" id="groupname" name="groupname" />
        <label for="procDetails" required="required">Group Details: </label>
        <input type="text" class="form-control" id="groupdetails" name="groupdetails" /><br>
        <label for="publicity">Private: </label>
          <div class="form-group" style="height:30px;">
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-on-color="success" data-off-text="Public" name="publicity"><br><br>
          </div>
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />

       </form>
       <button type="button" class="btn btn-success" id="addGroupBtn">Save</button>
              <button type="button" class="btn btn-primary" id="addGroupBtn2">Save &amp; Add Another</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        <label for="procName">Process Name :</label>
        <input type="text" class="form-control" id="procName" name="procName" />
        <label for="procDetails">Process Details: </label>
        <input type="text" class="form-control" id="procDetails" name="procDetails" /><br>
        <label for="publicity">Private: </label>
           <input type="checkbox" class="form-control" value="2" id="publicity" data-on-text="Private" data-on-color="success" data-off-text="Public" name="publicity"><br><br>
        <input type="hidden" class="form-control" id="procId" name="procId" />
       </form>
       <button type="button" class="btn btn-success" data-dismiss="modal" id="editProcBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        <label for="stepName">Step Name: </label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
        <input type="hidden" name="fid" id="fid" />

       </form>
       <br><button type="button" class="btn btn-success" id="addStepBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        <label for="stepName">Step Name: </label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
        <input type="hidden" name="fid" id="fid" />

       </form>
       <button type="button" class="btn btn-success" id="addStepBtn2">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        <label for="stepName">Step Name: </label>
        <input type="text" class="form-control" id="stepName" name="stepName" />
        <input type="hidden" name="id" value='<?php echo $_SESSION["uid"]; ?>' />
        <input type="hidden" name="pid" value='<?php echo $_GET['pid']; ?>' />
       </form>
       <button type="button" class="btn btn-success" data-dismiss="modal" id="editStepBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--  END MODALS -->


</body>
</html>
