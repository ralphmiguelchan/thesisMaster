<?php
include("conn.php");

$id = $_GET['fid'];

$query = "SELECT * FROM forms WHERE `form_id` = '$id'";
$ars = array();

$result = $conn->query($query);

while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>