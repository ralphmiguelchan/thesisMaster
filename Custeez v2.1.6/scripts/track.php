<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];
$pid = $_GET['pid'];
$query = "SELECT * FROM tracker WHERE `user_id` = '$uid' AND `process_id` = '$pid'";
$result = $conn->query($query);
$datum = array();
while($row = $result->fetch_assoc()){
	$datum[] = $row;
}

echo json_encode($datum);
?>