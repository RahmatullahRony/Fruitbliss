<?php
    session_start();

    include("connect.php");
    // Check if 'product_id' is present in the query string
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
    } else {
        $product_id = 3;
    }

    $quer = "SELECT * FROM products WHERE product_id = $product_id limit 1";
    $database = new connectDatabase();
    $res = $database->read($quer);
    $res = $res[0];
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruit Bliss Details</title>
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

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-11">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="<?php echo $res["product_image"] ?>" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"> <?php echo $res["product_name"] ?> </h4>
                                <p class="mb-3">Category: <?php echo $res["product_cat"] ?></p>
                                <h5 class="fw-bold mb-3">Price: <?php echo $res["unit_price"] ?> Tk</h5>
                               
                                <p class="mb-4"><?php echo $res["description"] ?></p>
                                <!--<p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>-->
                                <a href="#" pid='<?php echo $res["product_id"]?>' id='product' class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                     Add to cart
                                </a>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>

                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <?php echo $res["description"] ?>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-10">
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $res["weight"] ?> kg</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Country of Origin</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $res["origin"] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $res["quality"] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Сheck</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $res["chek"] ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <h1 class="fw-bold mb-0">Related products</h1>

                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">

                    <?php

                        $database = new connectDatabase();
                        $sec = $res["product_sec"];
                        $quer = "SELECT * FROM products WHERE product_sec = '$sec'";

                        $ress = $database->read($quer);

                        if($ress) {
                            foreach($ress as $val) {
                                include('related_products.php');
                            }
                        }        

                    ?>

                    </div>
                </div>

            </div>
        </div>
        <!-- Single Product End -->
    

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