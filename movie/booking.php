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
                <li class="breadcrumb-item active">Booking</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_movie WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $name = $row['name'];
    }
    ?>
    
    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-lg-6">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <form action="confirm-booking.php" class="form-horizontal" role="form" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Movie Name</label>
                                            <input type="text" name="movie" value="<?php echo $name ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <h2>Your Details</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" value="<?php echo $_SESSION['register']['name'] ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="text" name="phone" value="<?php echo $_SESSION['register']['phone'] ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Theater</label>
                                            <select name="theater" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                                <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_theater ORDER BY id");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                ?>
                                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">No of seats</label>
                                            <input type="number" name="seat" placeholder="Seats" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date</label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input type="text" name="time" class="form-control" value="<?php echo $_REQUEST['time'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <button type="submit" class="btn btn-block">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
        
<?php
include("includes/footer.php");
?>   