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
    $net = 0;
    if ($totalPrice > 0) {
        $delivery = 100;
        $net = $totalPrice + $delivery;
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruit Bliss Cart</title>
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





        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="col-md-12 col-xs-12" id="cart_msg">
				</div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
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
                                        include('cart_item.php');
                                    }
                                }        
                            ?>
                    </tbody>

                    </table>
                </div>

                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p id="cartSubTotal"  class="mb-0"> <?php echo $totalPrice ?> Tk </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p id="cartDelivery"  class="mb-0"> <?php echo $delivery ?> Tk </p>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p id="cartTotal" class="mb-0 pe-4"> <?php echo $net ?> Tk </p>
                            </div>
                            <a href="chackout.php"><button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    </body>

</html>