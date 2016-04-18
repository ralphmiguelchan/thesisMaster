<?php
include("conn.php");

$id = $_GET['id'];

$query = "SELECT * FROM forms WHERE `owner_id` = '$id'";
$ars = array();

$result = $conn->query($query);

while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>