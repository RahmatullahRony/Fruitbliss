<?php session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
}
include "./templates/top.php";
include "./templates/navbar.php"; ?>

<div class="container-fluid">
    <div class="row">
        <?php include "./templates/sidebar.php"; ?><div class="col-md-10">
      <div class="card my-3">


    <div class="col-md-10">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        </div>
        </div>
                <h1 class="h2">Admin Details</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="admin_list">
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
            </tr>
          </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include "./templates/footer.php"; ?>
<script type="text/javascript" src="./js/admin.js"></script>

