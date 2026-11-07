<?php

    include("connect.php");
    include("storeUser.php");

    $error = "";

    $fName = "";
    $lName = "";
    $address = "";
    $gender = "";
    $city = "";
    $dob = "";
    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $store = new createUser();
        $error = "";
        $attemptStore = $store->validateData($_POST);
        if($attemptStore!="") {
            $error = $attemptStore;
        } else {
            $error = "";
            header("Location:users_login.php");
            die;
        }
        $fName = $_POST['firstname'];
        $lName = $_POST['lastname'];
        $address = $_POST['address'];
        $gender = $_POST['inlineRadioOptions'];
        $city = $_POST['city'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Bliss Sign up</title>
    <link rel="stylesheet" href="loginsignup.css">
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



</head>


<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="./image/loginbg.jfif"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-6 text-black">
                      <h3 class="mb-5 text-uppercase">registration form</h3>

                      <div class="row">
                        <div class="col-md-6 mb-4">

                          <form method="post" action="">

                          <div data-mdb-input-init class="form-outline">

                            <input type="text" id="form3Example1m" name="firstname" value="<?php echo $fName?>" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1m">First name</label>

                          </div>
                        </div>

                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">

                            <input type="text" id="form3Example1n" name="lastname" value="<?php echo $lName?>" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1n">Last name</label>

                          </div>
                        </div>

                      </div>
      
                    
      
                      <div data-mdb-input-init class="form-outline mb-4">

                        <input type="text" name="address" value="<?php echo $address?>" id="form3Example8" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example8">Address</label>

                      </div>
      
                      <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
      
                        <h6 class="mb-0 me-4">Gender: </h6>
      
                        <div class="form-check form-check-inline mb-0 me-4">

                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                            value="Female" />
                          <label class="form-check-label" for="femaleGender">Female</label>

                        </div>
      
                        <div class="form-check form-check-inline mb-0 me-4">

                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                            value="Male" />
                          <label class="form-check-label" for="maleGender">Male</label>

                        </div>
      
                        <div class="form-check form-check-inline mb-0">

                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                            value="Prefer Not To Say" checked/>
                          <label class="form-check-label" for="otherGender">Prefer Not To Say</label>

                        </div>
      
                      </div>
      
                      <div class="row">
                        
                        <div class="col-md-6 mb-4">
      
                          <select name="city" data-mdb-select-init>

                            <option value="City">City</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Sylhet">Sylhet</option>
                            
                          </select>
      
                        </div>
                      </div>
      
                      <div data-mdb-input-init class="form-outline mb-4">

                        <input type="date" name="dob" value="<?php echo $dob?>" id="form3Example9" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example9">Date Of Birth</label>

                      </div>
      
      
                      <div data-mdb-input-init class="form-outline mb-4">

                        <input type="email" name="email" value="<?php echo $email?>" id="form3Example97" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example97">Email ID</label>

                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">

                        <input type="password" name="password" value="<?php echo $password?>" id="form3Example97" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example97">password</label>

                      </div>
                      <span class="error start" style="font-size: 95%; color:red"> <?php echo $error?></span>
                      <div class="d-flex justify-content-end pt-3">
                        <input type="submit" id="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2" value="Submit Form">
                        <!--<button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button>
                        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>-->
                      </div>
                      </form>

                      <div class="d-flex justify-content-around align-items-center mb-4 m-3">
                        <p>Already Have an Account?</p>
                        <a href="users_login.php">Log In</a>
                      </div>
                      <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #9b403ccc" href="index.php" role="button">
                      <i class="fab fa-facebook-f me-2"></i>Back to Home
                      </a>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



</body>
</html>