<?php
session_start();
include('conn.php');
$sub = $_GET['sub'];
$query = "DELETE FROM submittedforms WHERE `sub_id` = '$sub'";

$res = $conn->query($query);

if($res){
	
}
?>