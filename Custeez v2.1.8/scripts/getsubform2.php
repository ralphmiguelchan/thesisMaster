<?php
session_start();
include('conn.php');
$uid = $_GET['id'];

$query = "SELECT submittedforms.*,users.* FROM submittedforms JOIN users ON users.user_id = submittedforms.user_id WHERE form_id = '$uid'";

$res = $conn->query($query);

$ars = array();

while($row = $res->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>