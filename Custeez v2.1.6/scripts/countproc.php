<?php
session_start();
include('conn.php');
$uid = $_GET['pid'];

$pid = 0;
$query = "SELECT * FROM steps WHERE `process_id` = '$uid'";
$resul = $conn->query($query);

echo $resul->num_rows;
?>