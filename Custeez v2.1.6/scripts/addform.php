<?php
session_start();

include("conn.php");

$ownerId = $_POST['formOwner'];
$approverId = $_POST['formApprover'];
$formTitle = $_POST['formName'];
$sid = $_POST['sid'];

$jsondata = "";	
$arrays = array();
foreach( $_POST as $stuff ) {
    if( is_array( $stuff ) ) {
        array_push($arrays,$stuff);
    } else {
        
    }
}

$finals = json_encode($arrays);
$qf = "SELECT * FROM steps WHERE `step_id` = '$sid'";
$rf = $conn->query($qf);

$fid = 0;

while($row = $rf->fetch_assoc()){
	$fid = $row['form_id'];
}

$qs = "SELECT * FROM forms WHERE `form_id` = '$fid'";
$rs = $conn->query($qs);

if(($rs->num_rows) > 0){
	$q3 = "UPDATE forms SET `formName` = '$formTitle', `approver_id` = '$approverId', `formData` = '$finals' WHERE `form_id` = '$fid'";
	$r3 = $conn->query($q3);
	
	echo mysqli_error($conn);
}else{
$query = "INSERT into forms (formName, owner_id, approver_id, formData)VALUES('$formTitle','$ownerId','$approverId','$finals')";
$result = $conn->query($query);

if($result){
	$in_id = mysqli_insert_id($conn);
	$q = "UPDATE steps SET `form_id` = '$in_id' WHERE `step_id` = '$sid'";
	$r = $conn->query($q);
	
	if($r){
		echo "success";
	}
}
}

?>