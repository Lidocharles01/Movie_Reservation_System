<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}

if(isset($_POST['form1'])) {
	$valid = 1;

	if($valid == 1) {

	// getting auto increment id for photo renaming
	$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_theater'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$ai_id=$row[10];
	}

	$statement = $pdo->prepare("INSERT INTO tbl_theater (name,location) VALUES (?,?)");
	$statement->execute(array($_POST['name'],$_POST['location']));

    $_SESSION['status'] ="Theater added successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: theater.php');
	}
}

?>