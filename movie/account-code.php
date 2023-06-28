<?php require_once('security.php'); ?>

<?php
if(isset($_POST['form1'])) {

    $valid = 1;

    if($valid == 1) {
        
    $_SESSION['register']['name'] = $_POST['name'];

    // updating the database
    $statement = $pdo->prepare("UPDATE tbl_register SET name=? WHERE id=?");
    $statement->execute(array($_POST['name'],$_SESSION['register']['id']));

    $_SESSION['status'] ="Updated successfully";
    $_SESSION['status_code'] ="success";
    header('Location: account.php');
    }

}

if(isset($_POST['form2'])) {
	$valid = 1;

	if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $_SESSION['status'] ="Password can not be empty";
        $_SESSION['status_code'] ="warning";
        header('Location: account.php');
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
    	if($_POST['password'] != $_POST['re_password']) {
	    $valid = 0;
        $_SESSION['status'] ="Passwords do not match";
        $_SESSION['status_code'] ="warning";
        header('Location: account.php');
    	}        
    }

    if($valid == 1) {

    	$_SESSION['register']['password'] = md5($_POST['password']);

    	// updating the database
		$statement = $pdo->prepare("UPDATE tbl_register SET password=? WHERE id=?");
		$statement->execute(array(md5($_POST['password']),$_SESSION['register']['id']));

        $_SESSION['status'] ="Password is updated successfully";
        $_SESSION['status_code'] ="success";
        header('Location: account.php');
      
    }
}
?>