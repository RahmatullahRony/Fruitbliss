<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>




<div class="container mt-5 pt-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Admin Login</h4>
                    <p class="message"></p>


                    <form id="admin-login-form">

                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>

                        <input type="hidden" name="admin_login" value="1">
                        <button type="button" class="btn btn-primary btn-block login-btn">Sign In</button>
						  
              
              
                        <!-- Register buttons -->
                        <div class="text-center mt-4">
                          <p>Not a member? <a href="register.php">Register</a></p>
                          <p>or sign up with:</p>
                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                          </button>

                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                          </button>

                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                          </button>

                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                          </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
