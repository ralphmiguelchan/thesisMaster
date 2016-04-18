<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];

$pid = 0;
$query = "SELECT * FROM forms WHERE `approver_id` = '$uid'";
$resul = $conn->query($query);

echo $resul->num_rows;
?>