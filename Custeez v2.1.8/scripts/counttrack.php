<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];

$pid = 0;
$query = "SELECT * FROM tracker WHERE `user_id` = '$uid'";
$resul = $conn->query($query);

echo $resul->num_rows;
?>