<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];
$pid = $_GET['pid'];
$query = "SELECT * FROM tracker WHERE `user_id` = '$uid' AND `process_id` = '$pid'";
$result = $conn->query($query);

echo $result->num_rows;
?>