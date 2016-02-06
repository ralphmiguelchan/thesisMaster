<?php
include("conn.php");

$id = $_GET['id'];

$query = "DELETE from processes WHERE `process_id` = '$id'";
$result = $conn->query($query);

if(result){
	
}else{
	mysqli_error($conn);
}
?>