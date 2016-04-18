<?php
include("conn.php");
$id = $_GET['id'];
$query = "SELECT * FROM processes WHERE `process_id` = '$id'";
$result = $conn->query($query);
$ars = array();
$groupid = 0;
while($row = $result->fetch_assoc()){
	$groupid = $row['group_id'];
}

echo $groupid;
?>