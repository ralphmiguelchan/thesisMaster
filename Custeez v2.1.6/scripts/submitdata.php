<?php
session_start();

include("conn.php");

$sid = $_POST['sid'];
$uid = $_POST['uid'];
$pid = 0;
$jsondata = "";	

$arrays = array();

foreach( $_POST as $stuff ) {
    if( is_array( $stuff ) ) {
    	
    	foreach($stuff as $line){

    			array_push($arrays,$stuff);
    	
    	}
    } else {
        
    }
}

$finals = json_encode($arrays);

$query = "SELECT * FROM steps WHERE `step_id` = '$sid'";
$result = $conn->query($query);

$insert = 0;

while($rox = $result->fetch_assoc()){
	$insert = $rox['form_id'];
}
$query = "INSERT into submittedforms (subFormData, user_id, substatus, step_id,form_id)VALUES('$finals','$uid','0','$sid','$insert')";
$c = $conn->query($query);

if($c){
	$q = "SELECT * FROM tracker WHERE `user_id` = '$uid' AND `step_id` = '$sid'";
	$r = $conn->query($q);
	
	
	$v = "SELECT * FROM steps WHERE `step_id` = '$sid'";
	$x = $conn->query($v);
	
	while($row = $x->fetch_assoc()){
		$pid = $row['process_id'];
	}
	
	if($r->num_rows > 0){
			
		$n = "UPDATE tracker SET `step_id` = '$sid' WHERE `user_id` = '$uid' AND `process_id` = '$pid'";
	}else{
		$conn->query("INSERT into tracker(step_id,process_id,user_id,tstatus)VALUES('$sid','$pid','$uid','0')");
	}
	header('location: ../dashboard.php');
}

?>