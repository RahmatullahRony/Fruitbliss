<?php

    session_start();
    include("connect.php");
    include("update_profile.php");
    if(!isset($_SESSION['user'])){
        header("Location:users_login.php");
        die;
    }
    $error = "";
    $userID = $_SESSION['user']; 

    $database = new connectDatabase();

    $quer =   "SELECT * FROM users WHERE userID = '$userID'";
    
    $result = $database->read($quer);

    $res = $result[0];

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $store = new updateUser();
        $error = "";
        $attemptStore = $store->validateData($_POST);
        if($attemptStore!="") {
            $error = $attemptStore;
        } else {
            $error = "";
            header("Location:index.php");
            die;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="user_profile.css">
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    <div class="container container-shadow">
        <div class="modal-dialog-centered   ">
            <div class="align-items-center">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <H1>User Profile</H1>
                        

                        <form method="post" class="form-horizontal ng-pristine ng-valid" action="">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact1">First Name</label>

                                <div class="col-sm-10">

                                    <input class="form-control" id="inputContact1" name="firstName" type="text" placeholder="" value="<?php echo $res["firstName"] ?>">


                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact1">Last Name</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputContact10" name="lastName" type="text" placeholder="" value="<?php echo $res["lastName"] ?>">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact2">Email</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputContact2" name="email" type="email" value="<?php echo $res["email"] ?>">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact8">Gender</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputContact8" name="gender" type="text" placeholder=" " value="<?php echo $res["gender"] ?>" readonly>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact6">Date Of Birth</label>
                                <div class="col-sm-10">

                                    <input class="form-control" id="dob" name="dob" type="date" value="<?php echo $res["birthDate"] ?>"> </input>
                                    
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputContact6">City</label>
                                <div class="col-sm-10">
                                    
                                    <input class="form-control" id="city" name="city" type="text" value="<?php echo $res["city"] ?>"> </input>

                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label" for="inputContact6">Address</label>

                                <div class="col-sm-10">

                                    <input class="form-control" id="inputContact20" name="address" type="text" value="<?php echo $res["address"] ?>">

                                </div>
                            </div>


                           


                            <span class="error start" style="font-size: 95%; color:red"> <?php echo $error?></span>  
                           
                            <div class="form-group text-center">

                                <button type="button" class="btn btn-secondary btn-lg ml-2" onclick="window.history.back();">Back</button>
                                <input type="submit" id="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" value="Update">
                                
                            </div>
                        
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>

