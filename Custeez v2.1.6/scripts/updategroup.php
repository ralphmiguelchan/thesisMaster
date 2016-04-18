<?php
include("conn.php");
$title = $_POST['procName'];
$details = $_POST['procDetails'];
$id = $_POST['procId'];
$pub = $_POST['publicity'];
$query = "UPDATE groups SET `groupName` = '$title', `groupDetails` = '$details', `pubType_id` = '$pub' WHERE `group_id` = '$id'";



$result = $conn->query($query);

if($result){
	
}else{
	echo mysqli_error($conn);
}
?>