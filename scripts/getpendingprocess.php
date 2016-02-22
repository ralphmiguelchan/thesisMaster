<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];

$pid = 0;
$query = "SELECT tracker.*,steps.*,processes.* FROM tracker JOIN steps ON steps.step_id = tracker.step_id JOIN processes ON processes.process_id = tracker.process_id WHERE tracker.user_id = '$uid'";
$resul = $conn->query($query);
$ars = array();
while($row = $resul->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>