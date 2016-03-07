<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);
$pub = 0;
$name = ($obj->procName);
$details = ($obj->procDetails);
$id = ($obj->id);

if(isset($obj->publicity)){
	$pub = $obj->publicity;
}

$gid = 0;

if(isset($obj->gid)){
	$gid = ($obj->gid);
	
}

if($pub < 2){
	$pub = 1;
}else{
	$pub = 2;
}

$un = rand(1,999999);
$query = "INSERT into processes (processName,processDetails,owner_id,pubType_id,group_id,rgid) VALUES ('$name','$details','$id','$pub','$gid','$un')";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>