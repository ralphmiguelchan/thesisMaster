<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);

$names = mysql_real_escape_string($obj->stepName);
$id = mysql_real_escape_string($obj->id);
$pid = mysql_real_escape_string($obj->pid);
$fid = mysql_real_escape_string($obj->fid);
$query = "SELECT stepNum FROM steps WHERE `process_id` = '$pid'";
$result = $conn->query($query);
$step = 0;

while($row = $result->fetch_assoc()){
	$step = $row['stepNum'];
}

if($result && ($step != 0)){
$finalstep = $step + 1;
$q = "INSERT into forms(formName,owner_id,approver_id,formData)SELECT formName,owner_id,approver_id,formData FROM forms WHERE `form_id`='$fid'";
$r = $conn->query($q);

$rowid = mysqli_insert_id($conn);

$q = "INSERT into steps (stepNum,stepName,process_id,status,form_id) VALUES ('$finalstep','$names','$pid','0','$rowid')";
$r = $conn->query($q);

if($r){
echo mysqli_insert_id($conn);	
}

}else{
	$q = "INSERT into forms(formName,owner_id,approver_id,formData)SELECT formName,owner_id,approver_id,formData FROM forms WHERE `form_id`='$fid'";
	$r = $conn->query($q);
	
	$rowid = mysqli_insert_id($conn);
	
$q = "INSERT into steps (stepNum,stepName,process_id,status,form_id) VALUES ('1','$names','$pid','1','$rowid')";
$r = $conn->query($q);

if($r){
echo mysqli_insert_id($conn);
}
	
}
?>