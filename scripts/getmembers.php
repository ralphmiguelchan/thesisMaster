<?php
include("conn.php");
$id = $_GET['id'];
$query = "SELECT * FROM processes WHERE `process_id` = '$id'";
$result = $conn->query($query);
$ars = array();
$groupid = 0;
while($row = $result->fetch_assoc()){
	$groupid = $row['group_id'];
}

$q = "SELECT groupdata.user_id,users.username FROM groupdata JOIN users ON users.user_id = groupdata.user_id WHERE groupdata.group_id = '$groupid'";
$c = $conn->query($q);

if($c->num_rows > 0){
	while($row = $c->fetch_assoc()){
		$ars[] = $row;
	}
	
	echo json_encode($ars);

}else{
	$query = "SELECT * FROM users";
	$result = $conn->query($query);
	
	$array = array();
	while($row = $result->fetch_assoc()){
		$array[] = $row;
	}
	
	echo json_encode($array);
}

?>