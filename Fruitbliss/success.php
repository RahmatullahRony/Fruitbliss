<?php

    session_start();

    include("connect.php");
    $tid = $_GET["order_id"];
    $uid = $_SESSION["user"];

    $quer = "SELECT * FROM users WHERE userID = '$uid'";
    $database = new connectDatabase();
    $res = $database->read($quer);
    $res = $res[0];
    $uname = $res["firstName"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Thank You!</h3>
                        <p class="card-text">
                            Hello <span class="font-weight-bold"> <?php echo $uname ?> </span>, Your Order Has Been Successfully Placed.
                            Your Transaction ID is <span class="font-weight-bold"> <?php echo $tid ?> </span>.
                        </p>
                        <a href="shop.php">
                            <button class="btn btn-primary">Continue Shopping</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



