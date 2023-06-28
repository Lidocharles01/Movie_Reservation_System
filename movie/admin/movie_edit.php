<?php
include('includes/header.php');
?>

<?php
include('includes/navbar.php');
?>

<?php
include('includes/sidebar.php');
?>

  <?php
  // Check if the user is logged in or not
  if(!isset($_SESSION['user'])) {
    header('location: login');
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
          }
      }
        
      if($valid == 1) {
          
        if($path == '') {
        // updating into the database
        $statement = $pdo->prepare("UPDATE tbl_movie SET name=?, description=?, actor=? WHERE id=?");
        $statement->execute(array($_POST['name'],$_POST['description'],$_POST['actor'],$_REQUEST['id']));
        } else {

        unlink('../uploads/movies/'.$_POST['previous_photo']);
        
        $id = $_REQUEST['id'];
              
        $final_name = 'movie-'.$id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../uploads/movies/'.$final_name );

        // updating into the database
        $statement = $pdo->prepare("UPDATE tbl_movie SET name=?, description=?, actor=?, photo=? WHERE id=?");
        $statement->execute(array($_POST['name'],$_POST['description'],$_POST['actor'],$final_name,$_REQUEST['id']));
        }
        
        $_SESSION['status'] ="Data updated successfully!";
        $_SESSION['status_code'] ="success";
        header('Location: movie.php');
      }
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Movie Edit</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_movie WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $name = $row['name'];
        $description = $row['description'];
        $actor = $row['actor'];
        $photo = $row['photo'];
    }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-name">Movie</h3>
            </div>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <?php $csrf->echoInputField(); ?>
                <div class="card-body">
                <div class="form-group">
                    <label>Movie Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="30"><?php echo $description; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Actors</label>
                    <input type="text" name="actor" class="form-control" value="<?php echo $actor; ?>">                                  
                </div>
                <div class="form-group">
                    <label class="col-sm-12 control-label">photo</label>
                    <div class="col-sm-6" style="padding-top:6px;">
                        <?php
                        if($photo == '') {
                            echo 'No photo found';
                        } else {
                            echo '<img src="../uploads/movies/'.$photo.'" class="existing-photo" style="width:200px;">';	
                        }
                        ?>
                        <input type="hidden" name="previous_photo" value="<?php echo $photo; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Change photo</label>
                    <div class="custom-file">
                        <input type="file" name="photo">
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" name="form1">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
include('includes/footer.php');
?>