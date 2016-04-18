<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$uid = $_GET['uid'];
$query = "SELECT * FROM forms WHERE `owner_id` = '$uid' AND `formName` LIKE '$q%'";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>