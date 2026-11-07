<?php

  session_start();
  if(isset($_SESSION['user'])){
    header("location: index.php");
  }

    include("connect.php");
    include("loginUser.php");

    $email = "";
    $password = "";
    $error = "";
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $enter = new loginUser();
        $error = "";
        $attemptLogin = $enter->validateData($_POST);
        if($attemptLogin!="") {
            $error = $attemptLogin;
        } else {
            $error = "";
            header("Location: index.php");
            die;
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Bliss Log in</title>
    <link rel="stylesheet" href="loginsignup.css">
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



</head>



<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="./image/loginbg.jfif"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <form method="post" action="">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email address</label>
                </div>
      
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>
      
                <!--<div class="d-flex justify-content-around align-items-center mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkboxRemember" checked />
                    <label class="form-check-label" for="checkbox"> Remember me </label>
                  </div>
                </div> -->
      
                <!-- Submit button 
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Log in</button>-->

                <span class="error start" style="font-size: 95%; color:red"> <?php echo $error?></span>
                <input type="submit" id="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" value="Log In">

                
                <div class="d-flex justify-content-around align-items-center mb-4 m-3">
                  <p>Don't Have an Account?</p>
                  <a href="users_singup.php">Sign Up</a>
                </div>
                <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #9b403ccc" href="index.php"
                  role="button">
                  <i class="fab fa-facebook-f me-2"></i>Back to Home
                </a>
              </form>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
