<?php
session_start();
include('conn.php');
$uid = $_GET['id'];

$query = "SELECT * FROM submittedforms WHERE form_id = '$uid' LIMIT 0,1";

$res = $conn->query($query);

$ars = array();

while($row = $res->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>