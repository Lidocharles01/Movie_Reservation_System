<?php
include("includes/header.php");
?> 

<?php
// Check if the user is logged in or not
if(!isset($_SESSION['register'])) {
	header('location: login.php');
	exit;
}
?>
        
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="booking-nav" data-toggle="pill" href="#booking-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bookings</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                        <a class="nav-link" href="logout.php" onclick="return confirm('Do you want to Logout');"><i class="fa fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="booking-tab" role="tabpanel" aria-labelledby="booking-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Movie Name</th>
                                            <th>Theater</th>
                                            <th>Seats</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $statement = $pdo->prepare("SELECT * FROM tbl_booking WHERE name=? ORDER BY id DESC");
                                        $statement->execute(array($_SESSION['register']['name']));
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                        foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['booking_id'] ?></td>
                                            <td><?php echo $row['movie'] ?></td>
                                            <td><?php echo $row['theater'] ?></td>
                                            <td><?php echo $row['seat'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['time'] ?></td>
                                            <td><?php echo $row['seat'] * 100 ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Account Details</h4>
                            <form action="account-code.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="<?php echo $_SESSION['register']['name'] ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $_SESSION['register']['phone'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="form1" class="btn">Update</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>
                            <h4>Password change</h4>
                            <form action="account-code.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="password" name="password" placeholder="New Password" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="re_password" placeholder="Confirm Password" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="form2" class="btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account End -->
        
<?php
include("includes/footer.php");
?>   