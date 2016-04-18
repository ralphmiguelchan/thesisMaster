<?php
include("conn.php");
$id = $_GET['id'];
$name = $_GET['name'];


$query = "UPDATE steps SET `stepName` = '$name' WHERE `step_id` = '$id'";
$result = $conn->query($query);

if($result){
	
}

?>