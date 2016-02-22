<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);

$name = mysql_real_escape_string($obj->procName);
$details = mysql_real_escape_string($obj->procDetails);
$id = mysql_real_escape_string($obj->id);
$pub = mysql_real_escape_string($obj->publicity);
$gid = 0;
if(isset($obj->gid)){
	$gid = mysql_real_escape_string($obj->gid);
	
}
$un = uniqid();
$query = "INSERT into processes (processName,processDetails,owner_id,pubType_id,group_id,rgid) VALUES ('$name','$details','$id','$pub','$gid','$un')";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>