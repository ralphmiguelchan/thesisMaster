<?php
session_start();
include("conn.php");

$id = $_GET['id'];
$gid = $_GET['gid'];
$b = $_GET['b'];
$newid = 0;
$rowid = 0;
$formid = 0;
$rgid = rand(1,999999);
$query = "INSERT into processes(processName,processDetails,pubType_id,owner_id,group_id) SELECT processName,processDetails,pubType_id,owner_id,group_id FROM processes WHERE `process_id` = '$id'";
$result = $conn->query($query);

if($result){
	$newid = mysqli_insert_id($conn);
	
	$query = "UPDATE processes SET `processName` = '$b', `group_id` = '$gid',`rgid` = '$rgid' WHERE `process_id` = '$newid'";
	$result = $conn->query($query);
	
	$query = "SELECT * FROM steps WHERE `process_id` = '$id'";
	$resultd = $conn->query($query);
	
	while($row = $resultd->fetch_assoc()){
		$stepn = $row['step_id'];
		$query = "INSERT into steps(stepNum, stepName, process_id,form_id)SELECT stepNum, stepName, process_id, form_id FROM steps WHERE `step_id` = '$stepn'";
		$result = $conn->query($query);
		
		$rowid = mysqli_insert_id($conn);
		
		$query = "UPDATE steps SET `process_id` = '$newid' WHERE `step_id` = '$rowid'";
		$result = $conn->query($query);
		
		$query = "SELECT * FROM steps WHERE `step_id` = '$rowid'";
		$results = $conn->query($query);
		
		while($rows = $results->fetch_assoc()){
			$formn = $rows['form_id'];
			$query = "INSERT into forms(formName,owner_id,approver_id,formData) SELECT formName,owner_id,approver_id,formData FROM forms WHERE `form_id` = '$formn'";
			$result = $conn->query($query);
			
			$formid = mysqli_insert_id($conn);
			
			$query = "UPDATE steps SET `form_id` = '$formid' WHERE `step_id` = '$stepn'";
			$result = $conn->query($query);
		}
	}
}
?>