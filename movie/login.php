<?php require_once('security.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Movie Ticket booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->
    
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.html">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->   
    
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Login & Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="login-code.php" class="form-horizontal" role="form" method="post">
                                        <h2 class="text-center">Login Here!</h2>
                                        <br>
                                        <div class="form-group">
                                            <label for="phone" class="col-md-12 control-label">Email</label>
                                            <div class="col-md-12">
                                                <input type="number" name="phone" id="phone" placeholder="Phone Number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-md-12 control-label">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-offset-3">
                                                <button type="submit" name="form1" class="btn btn-block">Login</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-offset-3">
                                                <label>
                                                    <p>Don't have an account?<a href="register.php"> Register</a></p>
                                                </label>
                                            </div>
                                        </div>
                                    </form> <!-- /form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- Login End -->

    <br>
        
    <!-- Footer Start -->
    <div class="footer bg-white">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Get in Touch</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                            <p><i class="fa fa-envelope"></i>email@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Follow Us</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Company Info</h2>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Purchase Info</h2>
                        <ul>
                            <li><a href="#">Pyament Policy</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">cancel Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="img/godaddy.svg" alt="Payment Security" />
                        <img src="img/norton.svg" alt="Payment Security" />
                        <img src="img/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
        
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="#">EFILMS</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="#">EFILMS</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->       
    
    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="admin/dist/js/sweetalert.min.js"></script>

	<?php
	if(isset($_SESSION['status']) && $_SESSION['status'] !='')
	{
	?>
	<script>
	swal({
	title: "<?php echo $_SESSION['status']; ?>",
	//text: "You clicked the button!",
	icon: "<?php echo $_SESSION['status_code']; ?>",
	button: "Ok Done!",
	});
	</script>
	<?php
	unset($_SESSION['status']);
	}
	?>
    
</body>
</html>
