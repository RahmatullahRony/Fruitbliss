<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<div class="container-fluid">
    <div class="row">
        <?php include "./templates/sidebar.php"; ?>
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h2>Order List</h2>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Transaction ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order_list">
                    <!-- Order list will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once("./templates/footer.php"); ?>

<script type="text/javascript" src="./js/orders.js"></script>
