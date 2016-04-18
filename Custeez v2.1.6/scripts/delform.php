<?php
include("conn.php");

$id = $_GET['id'];

$query = "DELETE from forms WHERE `form_id` = '$id'";
$result = $conn->query($query);

if(result){
	
}else{
	mysqli_error($conn);
}
?>