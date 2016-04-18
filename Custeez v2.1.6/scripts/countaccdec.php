<?php
session_start();
include('conn.php');
$uid = $_GET['uid'];

$pid = 0;
$query = "SELECT * FROM submittedforms WHERE `user_id` = '$uid' AND (submittedforms.substatus = '1' OR submittedforms.substatus = '2')";
$resul = $conn->query($query);

echo $resul->num_rows;
?>