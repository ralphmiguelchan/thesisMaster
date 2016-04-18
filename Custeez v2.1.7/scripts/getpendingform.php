<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];

$query = "SELECT users.*, submittedforms.*,processes.*,steps.*, forms.* FROM submittedforms JOIN users ON users.user_id = submittedforms.user_id JOIN steps ON steps.step_id = submittedforms.step_id JOIN processes ON processes.process_id = steps.process_id JOIN forms ON forms.form_id = steps.form_id WHERE forms.approver_id = '$uid' AND submittedforms.substatus = '0'";

$res = $conn->query($query);

$ars = array();

while($row = $res->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>