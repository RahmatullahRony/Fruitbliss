<?php

    include("loginUser.php");

    $log = new loginUser();
    $userData = $log->loginCheck($_SESSION['user']);
    
?>

<div class="container-fluid fixed-top">

    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.php" class="navbar-brand">
                <h1 class="text-primary display-6">Fruit Bliss</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link" id="navHome">Home</a>
                    <a href="shop.php" class="nav-item nav-link" id="navShop">Shop</a>
                    <a href="shop-detail.php" class="nav-item nav-link" id="navShopDetail">Shop Detail</a>
                    <a href="contact.php" class="nav-item nav-link" id="navContact">Contact</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <a href="cart.php" class="position-relative me-4 my-auto" title="Cart">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" id="badge""
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                    </a>
                    <a href="user_profile.php" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>

                    <?php 
                        if ($userData=="null") {
                    ?>
                    <a href="users_login.php">
                        <button type="button" class="loginsignup">Log in</button>
                    </a>

                    <li class="divider">|</li>

                    <a href="users_singup.php">
                        <button type="button" class="loginsignup">Sign up</button>
                    </a>
                    <?php
                        } else {     
                    ?>

                    <a href="logout.php">
                        <button type="button" class="loginsignup">Log Out</button>
                    </a>
                    <?php
                        }     
                    ?>

                </div>
            </div>
        </nav>
    </div>
</div>