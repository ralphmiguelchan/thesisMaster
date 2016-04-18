<?php
session_start();
include("conn.php");

$gid = $_GET['gid'];
$uid = $_GET['uid'];
$query = "INSERT into groupdata(group_id,user_id) VALUES ('$gid','$uid')";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>