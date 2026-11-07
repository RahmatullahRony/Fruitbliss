<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0 mr-3" href="#"><img src="logo.png" alt="logo" style="width:120px" class="logo"></a>
  
  <ul class="navbar-nav px-3 mr-3">
    <li class="nav-item text-nowrap">
      <?php
        if (isset($_SESSION['admin_id'])) {
          ?>
            <a class="nav-link" href="../admin/admin-logout.php" style="color: white ;margin: 10px 60px; padding: 10px; background-color:#9b403ccc  ">Sign out</a>
          <?php
        } else {
          $uriAr = explode("/", $_SERVER['REQUEST_URI']);
          $page = end($uriAr);
          if ($page === "login.php") {
            ?>
              <a class="nav-link" href="../admin/register.php">Register</a>
            <?php
          } else {
            ?>
              <a class="nav-link" href="../admin/login.php">Login</a>
            <?php
          }
        }
      ?>
    </li>
  </ul>
</nav>
