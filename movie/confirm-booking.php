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
                <li class="breadcrumb-item active">Confirm Booking</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <p>Name<span><?php echo $_REQUEST['name'] ?></span></p>
                            <p>Phone<span><?php echo $_REQUEST['phone'] ?></span></p>
                            <hr>
                            <p>Movie Name<span><?php echo $_REQUEST['movie'] ?></span></p>
                            <p>Theater<span><?php echo $_REQUEST['theater'] ?></span></p>
                            <p>Date<span><?php echo $_REQUEST['date'] ?></span></p>
                            <p>Time<span><?php echo $_REQUEST['time'] ?></span></p>
                            <p>Total seats<span><?php echo $_REQUEST['seat'] ?></span></p>
                            <p class="ship-cost">total<span><?php echo $_REQUEST['seat'] * 100 ?></span></p>
                            <h2>Grand Total<span><?php echo $_REQUEST['seat'] * 100 ?></span></h2>
                        </div>
                        <form action="booking-code.php" method="post">
                            <input type="hidden" name="name" value="<?php echo $_REQUEST['name'] ?>">
                            <input type="hidden" name="phone" value="<?php echo $_REQUEST['phone'] ?>">
                            <input type="hidden" name="movie" value="<?php echo $_REQUEST['movie'] ?>">
                            <input type="hidden" name="theater" value="<?php echo $_REQUEST['theater'] ?>">
                            <input type="hidden" name="date" value="<?php echo $_REQUEST['date'] ?>">
                            <input type="hidden" name="time" value="<?php echo $_REQUEST['time'] ?>">
                            <input type="hidden" name="seat" value="<?php echo $_REQUEST['seat'] ?>">
                            <div class="checkout-payment">
                                <div class="checkout-btn">
                                    <button type="submit" name="form1" class="btn btn-block">Confirm Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
        
<?php
include("includes/footer.php");
?>   