<?php
session_start();
include("conn.php");
$obj = json_decode($_POST['myData']);

$name = mysql_real_escape_string($obj->procName);
$details = mysql_real_escape_string($obj->procDetails);
$id = mysql_real_escape_string($obj->id);
$pub = mysql_real_escape_string($obj->publicity);
$query = "INSERT into processes (processName,processDetails,owner_id,pubType_id) VALUES ('$name','$details','$id','$pub')";
$result = $conn->query($query);

if($result){
	echo mysqli_insert_id($conn);
}
?>