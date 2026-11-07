<?php

    session_start();

    include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruit Bliss Shop</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <?php
                include("navbar.php");
        ?>
        <!-- Navbar End -->







        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Fruits</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;"> Seasonal Fruits</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Year Round Fruits</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Special Fruits</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 col-xs-12" id="product_msg">
					</div>

                    <div class="tab-content">

                        <div id="tab-1" class="tab-pane fade show p-0 active">

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                                        
                                        <?php

                                            $database = new connectDatabase();

                                            $quer = "SELECT * FROM products";

                                            $res = $database->read($quer);

                                            if($res) {
                                                foreach($res as $val) {
                                                    include('shop_product.php');
                                                }
                                            }        

                                        ?>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0">

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                                    
                                    <?php

                                            $database = new connectDatabase();

                                            $quer = "SELECT * FROM products WHERE product_sec ='Seasonal'";

                                            $res = $database->read($quer);

                                            if($res) {
                                                foreach($res as $val) {
                                                    include('shop_product.php');
                                                }
                                            }        

                                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                                    <?php

                                            $database = new connectDatabase();

                                            $quer = "SELECT * FROM products WHERE product_sec ='Yearly'";

                                            $res = $database->read($quer);

                                            if($res) {
                                                foreach($res as $val) {
                                                    include('shop_product.php');
                                                }
                                            }        

                                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-4" class="tab-pane fade show p-0">

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                                    <?php

                                        $database = new connectDatabase();

                                        $quer = "SELECT * FROM products WHERE product_sec ='Special'";

                                        $res = $database->read($quer);

                                        if($res) {
                                            foreach($res as $val) {
                                                include('shop_product.php');
                                            }
                                        }        

                                    ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Footer Start -->
        <?php
                include("footer.php");
        ?>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="test.js"></script>
    </body>

</html>