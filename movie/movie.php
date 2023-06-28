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
                <li class="breadcrumb-item active">Movies List</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_movie ORDER BY id DESC");
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
        </div>
    </div>
    <!-- Product List End -->  
    
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