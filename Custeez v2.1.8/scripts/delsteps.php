<?php
include("conn.php");

$id = $_GET['id'];

$query = "DELETE from steps WHERE `step_id` = '$id'";
$result = $conn->query($query);

if(result){
	
}else{
	mysqli_error($conn);
}
?>