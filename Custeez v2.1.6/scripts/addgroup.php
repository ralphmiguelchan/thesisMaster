<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);
$pub = 0;
$name =($obj->groupname);
$details = ($obj->groupdetails);
$id = ($obj->id);
if(isset($obj->publicity)){
	$pub = $obj->publicity;
}
$un = uniqid();

if($pub < 2){
	$pub = 1;
}else{
	$pub = 2;
}

$query = "INSERT into groups (groupName,groupDetails,owner_id,pubType_id) VALUES ('$name','$details','$id','$pub')";
$result = $conn->query($query);

if($result){
	$ids = mysqli_insert_id($conn);
	echo $ids;
	
	$query = "INSERT into groupdata (group_id,user_id) VALUES ('$ids','$id')";
	$result = $conn->query($query);
}
?>