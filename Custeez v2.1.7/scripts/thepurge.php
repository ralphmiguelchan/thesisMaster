<?php
session_start();
include("conn.php");

$q = "TRUNCATE TABLE forms";
$r = $conn->query($q);

$q = "TRUNCATE TABLE groupdata";
$r = $conn->query($q);

$q = "TRUNCATE TABLE groups";
$r = $conn->query($q);

$q = "TRUNCATE TABLE processes";
$r = $conn->query($q);


$q = "TRUNCATE TABLE steps";
$r = $conn->query($q);


$q = "TRUNCATE TABLE submittedforms";
$r = $conn->query($q);

$q = "TRUNCATE TABLE tracker";
$r = $conn->query($q);

$q = "TRUNCATE TABLE users";
$r = $conn->query($q);

?>