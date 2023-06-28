<?php require_once('security.php'); ?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;
if(strlen($_POST['phone'])<10) {
        $valid = 0;
        $_SESSION['status'] ="Phone number should be 10 digit";
        $_SESSION['status_code'] ="warning";
        header("location: register.php");
    } else {
        $statement = $pdo->prepare("SELECT * FROM tbl_register WHERE phone=?");
        $statement->execute(array($_POST['phone']));
        $total = $statement->rowCount();                            
        if($total) {
            $valid = 0;
            $_SESSION['status'] ="Phone number already exists";
            $_SESSION['status_code'] ="warning";
            header("location: register.php");
        }
    }

    if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $_SESSION['status'] ="Password can not be empty";
        $_SESSION['status_code'] ="warning";
        header("location: register.php");
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
        if($_POST['password'] != $_POST['re_password']) {
            $valid = 0;
            $_SESSION['status'] ="Passwords do not match";
            $_SESSION['status_code'] ="warning";
            header("location: register.php");
        }
    }

    if($valid == 1) {
        
        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_register (name,phone,password) VALUES (?,?,?)");
        $statement->execute(array($_POST['name'],$_POST['phone'],md5($_POST['password'])));

        if(empty($_POST['phone']) || empty($_POST['password'])) {
            $_SESSION['status'] ="Phone and/or Password can not be empty";
            $_SESSION['status_code'] ="warning";
            header("location: register.php");
        } else {
            $phone = strip_tags($_POST['phone']);
            $password = strip_tags($_POST['password']);

            $statement = $pdo->prepare("SELECT * FROM tbl_register WHERE phone=?");
            $statement->execute(array($phone));
            $total = $statement->rowCount();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row) {
                $row_password = $row['password'];
                $phone = $row['phone'];
            }

            if($total==0) {
                $_SESSION['status'] ="Phone number does not match";
                $_SESSION['status_code'] ="warning";
                header("location: login.php");
            } else {
    
                if( $row_password != md5($password) ) {
                    $_SESSION['status'] ="Passwords do not match";
                    $_SESSION['status_code'] ="warning";
                    header("location: login.php");
                } else {
                    $_SESSION['register'] = $row;
                    $_SESSION['status'] ="Welcome";
                    $_SESSION['status_code'] ="success";
                    header("location: index.php");
                }
                
            }
        }
    }
}
?>