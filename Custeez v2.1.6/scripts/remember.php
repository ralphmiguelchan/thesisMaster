<?php
session_start();
include("conn.php");

$gid = $_GET['id'];
$query = "DELETE from groupdata WHERE `groupdata_id` = '$gid'";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>