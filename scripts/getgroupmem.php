<?php
include("conn.php");
$id = $_GET['id'];
$query = "SELECT groupdata.*,users.username FROM groupdata JOIN users ON users.user_id = groupdata.user_id WHERE groupdata.group_id = '$id'";
$result = $conn->query($query);
$ars = array();

while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>