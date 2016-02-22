<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);

$name = mysql_real_escape_string($obj->groupname);
$details = mysql_real_escape_string($obj->groupdetails);
$id = mysql_real_escape_string($obj->id);
$pub = mysql_real_escape_string($obj->publicity);
$un = uniqid();
$query = "INSERT into groups (groupName,groupDetails,owner_id,pubType_id) VALUES ('$name','$details','$id','$pub')";
$result = $conn->query($query);

if($result){
	$ids = mysqli_insert_id($conn);
	echo $ids;
	
	$query = "INSERT into groupdata (group_id,user_id) VALUES ('$ids','$id')";
	$result = $conn->query($query);
}
?>