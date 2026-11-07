<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    <?php include "./templates/sidebar.php"; ?>
    <div class="col-md-10">
      <div class="card my-3">


    <div class="col-md-10">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
      
    <h4>Brand List</h4>
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_brand_modal">
                <i class="fa fa-plus"></i> Add Brand
              </button>
            </div>
          </div>
          
          
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="brand_list">
                <!-- Brand items will be listed here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Brand Modal -->

<!-- Add Brand Modal -->
<div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <form id="add-brand-form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="brand_title">Brand Name</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" placeholder="Enter Brand Name" required>
          </div>
          <input type="hidden" name="add_brand" value="1">
          <div class="form-group text-center">
            <button type="submit" class="btn btn-success add-brand">Add Brand</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="brand_id">
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="e_brand_title" class="form-control" placeholder="Enter Brand Name">
              </div>
            </div>
            <input type="hidden" name="edit_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-brand-btn">Update Brand</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>


<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/brands.js"></script>