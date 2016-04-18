<?php
session_start();
include('conn.php');
$q = $_GET['q'];
$query = "SELECT * FROM users WHERE ((`username` LIKE '$q%') OR (`userDetails` LIKE '$q%') OR (`email` LIKE '$q%'))";
$result = $conn->query($query);
$arrays = array();
while($row = $result->fetch_assoc()){
	$arrays[] = $row;
}

echo json_encode($arrays);
?>