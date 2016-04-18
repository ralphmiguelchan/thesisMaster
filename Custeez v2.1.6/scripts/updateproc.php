<?php
include("conn.php");
$title = $_POST['procName'];
$details = $_POST['procDetails'];
$id = $_POST['procId'];
$pub = $_POST['publicity'];
$query = "UPDATE processes SET `processName` = '$title', `processDetails` = '$details', `pubType_id` = '$pub' WHERE `process_id` = '$id'";



$result = $conn->query($query);

if($result){
	
}else{
	echo mysqli_error($conn);
}
?>