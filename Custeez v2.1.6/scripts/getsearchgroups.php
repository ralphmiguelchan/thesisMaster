<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$query = "SELECT * FROM groups WHERE `pubType_id` = '1' AND ((`groupName` LIKE '$q%') OR (`groupDetails` LIKE '$q%'))";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>