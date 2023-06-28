  <?php
  include('includes/header.php');
  ?>

  <?php
  include('includes/navbar.php');
  ?>

  <?php
  include('includes/sidebar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
            $total_user = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_register");
            $statement->execute();
            $total_user = $statement->rowCount();
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_user ?></h3>
                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            $total_movie = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_movie");
            $statement->execute();
            $total_movie = $statement->rowCount();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_movie ?></h3>
                <p>Total movies</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

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
