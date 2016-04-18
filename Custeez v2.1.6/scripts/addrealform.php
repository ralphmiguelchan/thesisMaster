<?php
session_start();

include("conn.php");

$ownerId = $_POST['formOwner'];
$approverId = $_POST['formApprover'];
$formTitle = $_POST['formName'];
$fid = $_POST['fid'];


$jsondata = "";	
$arrays = array();
foreach( $_POST as $stuff ) {
    if( is_array( $stuff ) ) {
        array_push($arrays,$stuff);
    } else {
        
    }
}

$finals = json_encode($arrays);

	$q3 = "UPDATE forms SET `formName` = '$formTitle', `approver_id` = '$approverId', `formData` = '$finals' WHERE `form_id` = '$fid'";
	$r3 = $conn->query($q3);
	
	echo $fid;

?>