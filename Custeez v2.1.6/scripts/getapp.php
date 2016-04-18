<?php
session_start();
include("conn.php");

$query = "SELECT * FROM users";
$result = $conn->query($query);

$array = array();
while($row = $result->fetch_assoc()){
	$array[] = $row;
}

echo json_encode($array);
?>