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
	
	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $_SESSION['status'] ="You must have to upload jpg, jpeg, gif or png file";
            $_SESSION['status_code'] ="warning";
            header('Location: movie.php');
            
        }
    }
	

	if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_movie'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

		if($path=='') {
			// When no photo will be selected
			$statement = $pdo->prepare("INSERT INTO tbl_movie (name,description,actor) VALUES (?,?,?)");
			$statement->execute(array($_POST['name'],$_POST['description'],$_POST['actor']));
		} else {
			
			$final_name = 'movie-'.$ai_id.'.'.$ext;
            move_uploaded_file( $path_tmp, '../uploads/movies/'.$final_name);
 
            $statement = $pdo->prepare("INSERT INTO tbl_movie (name,description,actor,photo) VALUES (?,?,?,?)");
			$statement->execute(array($_POST['name'],$_POST['description'],$_POST['actor'],$final_name));
		}
	
    $_SESSION['status'] ="New movie added successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: movie.php');
	}
}

?>