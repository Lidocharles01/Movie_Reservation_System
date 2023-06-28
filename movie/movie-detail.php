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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Movie Detials</li>
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
        $description = $row['description'];
        $actor = $row['actor'];
        $photo = $row['photo'];
    }
    ?>
    
    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="uploads/movies/<?php echo $photo ?>" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2><?php echo $name ?></h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <br>
                                    <div class="action">
                                        <h4>Show Time</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Select time</p>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn" href="booking.php?id=<?php echo $_REQUEST['id'] ?>&time=9:00 AM">9:00 AM</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn" href="booking.php?id=<?php echo $_REQUEST['id'] ?>&time=12:00 PM">12:00 PM</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn" href="booking.php?id=<?php echo $_REQUEST['id'] ?>&time=4:00 PM">4:00 PM</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Movie Detials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Actors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Movie Detials</h4>
                                    <p>
                                        <?php echo $description ?>
                                    </p>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>Actors</h4>
                                    <p>
                                        <?php echo $actor ?>
                                    </p>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            <?php
                            $statement = $pdo->prepare("SELECT * FROM tbl_movie ORDER BY id DESC LIMIT 8");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                            foreach ($result as $row) {
                            ?>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#"><?php echo $row['name'] ?></a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="movie-detail.php?id=<?php echo $row['id'] ?>">
                                        <img src="uploads/movies/<?php echo $row['photo'] ?>" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3> <a class="btn" href="">Book Now</a></h3>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
    
    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->
        
<?php
include("includes/footer.php");
?>   