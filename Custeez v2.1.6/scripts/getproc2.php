<?php
include("conn.php");
$id = $_GET['id'];
$gid = $_GET['gid'];
$query = "SELECT * FROM processes WHERE `owner_id` = '$id' AND `group_id` != '$gid'";
$result = $conn->query($query);
$ars = array();
while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>