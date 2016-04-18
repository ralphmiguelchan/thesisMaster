<?php
session_start();
include('conn.php');
$id = $_GET['sid'];
$query = "SELECT * FROM steps WHERE `step_id` = '$id'";
$result = $conn->query($query);

$form_id = 0;

while($row = $result->fetch_assoc()){
	$form_id = $row['form_id'];
}

$q = "SELECT * FROM forms WHERE `form_id` = '$form_id'";
$r = $conn->query($q);

$datum = array();

while($row = $r->fetch_assoc()){
	$datum[] = $row;
}

echo json_encode($datum);
?>