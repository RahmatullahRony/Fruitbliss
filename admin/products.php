<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<div class="container-fluid">
    <div class="row">
        <?php include "./templates/sidebar.php"; ?>
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h2>Product List</h2>
                </div>
                <div class="col-2">
                    <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-warning btn-sm">Add Product</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Section</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Weight</th>
                        <th>Origin</th>
                        <th>Quality</th>
                        <th>Check</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="product_list">
                    <!-- Product list will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control" name="product_image" required>
                        </div>
                        <div class="form-group">
                            <label for="product_cat">Category</label>
                            <input type="text" class="form-control" name="product_cat" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="product_sec">Section</label>
                            <input type="text" class="form-control" name="product_sec" required>
                        </div> -->
                        <div class="form-group">
                        <label for="product_sec">Section</label>
                        <select id="product_sec" class="form-control" name="product_sec" required>
                            <option value="Yearly">Yearly</option>
                            <option value="Seasonal">Seasonal</option>
                            <option value="Special">Special</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="unit_price">Price</label>
                            <input type="number" class="form-control" name="unit_price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" name="weight" required>
                        </div>
                        <div class="form-group">
                            <label for="origin">Origin</label>
                            <input type="text" class="form-control" name="origin" required>
                        </div>
                        <div class="form-group">
                            <label for="quality">Quality</label>
                            <input type="text" class="form-control" name="quality" required>
                        </div>
                        <div class="form-group">
                            <label for="chek">Check</label>
                            <input type="text" class="form-control" name="chek" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <button type="button" class="btn btn-primary add-product">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form">
                        <input type="hidden" name="pid">
                        <div class="form-group">
                            <label for="e_product_name">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="e_product_image">Product Image</label>
                            <input type="file" class="form-control" name="product_image">
                            <img src="" alt="Product Image" style="width: 60px; height: 60px;">
                        </div>
                        <div class="form-group">
                            <label for="e_product_cat">Category</label>
                            <input type="text" class="form-control" name="product_cat" required>
                        </div>
                        <div class="form-group">
                            <label for="e_product_sec">Section</label>
                            <input type="text" class="form-control" name="product_sec" required>
                        </div>
                        <div class="form-group">
                            <label for="e_unit_price">Price</label>
                            <input type="number" class="form-control" name="unit_price" required>
                        </div>
                        <div class="form-group">
                            <label for="e_description">Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="e_weight">Weight</label>
                            <input type="number" class="form-control" name="weight" required>
                        </div>
                        <div class="form-group">
                            <label for="e_origin">Origin</label>
                            <input type="text" class="form-control" name="origin" required>
                        </div>
                        <div class="form-group">
                            <label for="e_quality">Quality</label>
                            <input type="text" class="form-control" name="quality" required>
                        </div>
                        <div class="form-group">
                            <label for="e_chek">Check</label>
                            <input type="text" class="form-control" name="chek" required>
                        </div>
                        <div class="form-group">
                            <label for="e_stock">Stock</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <button type="button" class="btn btn-primary submit-edit-product">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("./templates/footer.php"); ?>

<script type="text/javascript" src="./js/products.js"></script>
