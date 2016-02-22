<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$query = "SELECT * FROM processes WHERE `pubType_id` = '1' AND ((`processName` LIKE '$q%') OR (`processDetails` LIKE '$q%') OR (`rgid` LIKE '$q%'))";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>