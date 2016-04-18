<?php
session_start();
include('conn.php');
$pid = $_GET['pid'];
$q = "SELECT * FROM steps WHERE `process_id` = '$pid'";
$r = $conn->query($q);

$array = array();
while($row = $r->fetch_assoc()){
	$array[] = $row;
}

echo json_encode($array);
?>