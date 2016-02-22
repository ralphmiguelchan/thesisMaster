<?php
session_start();
include("conn.php");

$id = $_GET['id'];
$gid = $_GET['gid'];
$query = "UPDATE processes SET `group_id` = '$gid' WHERE `process_id` = '$id'";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>