<?php
include("conn.php");

$id = $_GET['id'];

$query = "DELETE from processes WHERE `process_id` = '$id'";
$result = $conn->query($query);

if(result){
	$q = "DELETE from steps WHERE `process_id` = '$id'";
	$conn->query($q);
	
	$q1 = "DELETE from tracker WHERE `process_id` = '$id'";
	$conn->query($q1);
}else{
	mysqli_error($conn);
}
?>