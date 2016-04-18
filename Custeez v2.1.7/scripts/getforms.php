<?php
include("conn.php");

$id = $_GET['id'];

$query = "SELECT users.*,forms.* FROM forms JOIN users ON users.user_id = forms.owner_id WHERE forms.owner_id = '$id'";
$ars = array();

$result = $conn->query($query);

while($row = $result->fetch_assoc()){
	$ars[] = $row;
}

echo json_encode($ars);
?>