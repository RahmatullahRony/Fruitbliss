<?php
    session_start();
    include("connect.php");
    if(!isset($_SESSION['user'])){
        header("Location:users_login.php");
        die;
    }

    $totalPrice = 0;
    $userID = $_SESSION['user']; 
    $database = new connectDatabase();

    $quer =   "SELECT p.unit_price, c.quantity  FROM products p 
                JOIN carts c ON p.product_id = c.product_id 
                WHERE c.userID = '$userID'";
    
    $result = $database->read($quer);
    
    $totalPrice = 0;

    if ($result) {
        foreach ($result as $row) {
            $totalPrice += $row['unit_price'] * $row['quantity'];
        }
    }
    $delivery = 0;
    $net = $totalPrice;
    if ($totalPrice > 0 && $totalPrice <= 2000) {
        $delivery = 100;
        $net = $totalPrice + $delivery;
    }
?>




<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruit Bliss checkout</title>
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


        <!-- Checkout Page Start -->
        <div class="container_shadow">
            <div class="container py-5">
                <form method="post" action="">
                        <div class="col-md-12 col-lg-6 col-xl-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            
                                            $uid = $_SESSION["user"];
                                            $database = new connectDatabase();
            
                                            $quer = "SELECT * 
                                                    FROM products p
                                                    JOIN carts c ON p.product_id = c.product_id
                                                    WHERE c.userID = '$uid'";
            
                                            $res = $database->read($quer);
            
                                            if ($res) {
                                                foreach ($res as $val) {
                                                    include('cartCheckout.php');
                                                }
                                            }      
                                        ?>



                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-3">Subtotal</p>
                                            </td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"> <?php echo $totalPrice ?> </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-3">Shipping</p>
                                            </td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"> <?php echo $delivery ?> </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5 text-primary">
                                                <p class="mb-0 text-dark text-uppercase py-3 ">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"> <?php echo $net ?> </p>
                                                </div>

                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"> Cash On Delivery </p>
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">

                                <a href="place_order.php">

                                    <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>

                                </a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


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
    </body>

</html>