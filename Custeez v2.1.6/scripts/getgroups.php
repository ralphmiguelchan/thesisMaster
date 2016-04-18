<?php
include("conn.php");

$gid = $_GET['gid'];

$query = "SELECT * FROM processes WHERE `group_id` = '$gid'";
$ars = array();

$result = $conn->query($query);

while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>