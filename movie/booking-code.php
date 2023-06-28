<?php require_once('security.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if($valid == 1) {

	// getting auto increment id for photo renaming
	$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_booking'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$ai_id=$row[10];
	}

    $random_number = round(microtime(true));

	$booking_id = $random_number.''.$ai_id;

	$statement = $pdo->prepare("INSERT INTO tbl_booking (name,phone,movie,theater,date,time,seat,booking_id,status) VALUES (?,?,?,?,?,?,?,?,?)");
	$statement->execute(array($_POST['name'],$_POST['phone'],$_POST['movie'],$_POST['theater'],$_POST['date'],$_POST['time'],$_POST['seat'],$booking_id,'Pending'));

    $_SESSION['status'] ="Booked successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: account.php');
	}
}
?>