<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$fid = $_GET['fid'];

$query = "SELECT users.*,submittedforms.* FROM submittedforms JOIN users ON users.user_id = submittedforms.user_id WHERE `form_id` = '$fid' AND `subFormData` LIKE '%$q%' ";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>