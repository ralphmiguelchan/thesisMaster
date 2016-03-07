<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$fid = $_GET['fid'];

$query = "SELECT * FROM submittedforms WHERE `form_id` = '$fid' AND `subFormData` LIKE '%$q%' ";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>