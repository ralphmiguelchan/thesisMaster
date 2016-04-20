<?php
session_start();
include("conn.php");

$sid = $_GET['sid'];
$query = "SELECT * FROM steps WHERE `step_id` = '$sid'";
$result = $conn->query($query);

$id = 0;
while($row = $result->fetch_assoc()){
$id = $row['stepNum'];
}

echo $id;
?>