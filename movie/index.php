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
        
    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/category-1.jpg" />
                            <a class="img-text" href="">
                                <p>releasing today...</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/category-2.jpg" />
                            <a class="img-text" href="">
                                <p>releasing soon</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="img/slider-1.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Book your seats now</p>
                                <a class="btn" href="movie.php">Book Now</a></h3>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-2.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Book your seats now</p>
                                <a class="btn" href="movie.php">Book Now</a></h3>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-3.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Book your seats now</p>
                                <a class="btn" href="movie.php">Book Now</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/category-1.jpg" />
                            <a class="img-text" href="">
                                <p>releasing today...</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/category-2.jpg" />
                            <a class="img-text" href="">
                                <p>releasing soon</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->      
    
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

    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Latest Releases</h1>
            </div>
            <div class="row align-items-center">
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_movie ORDER BY id DESC LIMIT 8");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                foreach ($result as $row) {
                ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="movie-detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
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
                            <h3><a class="btn" href="movie-detail.php?id=<?php echo $row['id'] ?>">Book Now</a></h3>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Featured Product End -->
    
    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-3.jpg" />
                        <a class="category-name" href="">
                            <p>releasing today...</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img src="img/category-4.jpg" />
                        <a class="category-name" href="">
                            <p>streaming now....</p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img src="img/category-5.jpg" />
                        <a class="category-name" href="">
                            <p>releasing today...</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src="img/category-6.jpg" />
                        <a class="category-name" href="">
                            <p>streaming now....</p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src="img/category-7.jpg" />
                        <a class="category-name" href="">
                            <p>releasing today...</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-8.jpg" />
                        <a class="category-name" href="">
                            <p>comming soon....</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->       
      
    
    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Subscribe Our Newsletter</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->        
        
<?php
include("includes/footer.php");
?>