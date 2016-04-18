<?php
include("conn.php");
$id = $_GET['id'];
$query = "SELECT * FROM groups WHERE `owner_id` = '$id'";
$result = $conn->query($query);
$ars = array();
while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>