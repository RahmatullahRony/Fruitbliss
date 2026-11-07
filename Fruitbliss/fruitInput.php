<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <link rel="stylesheet" href="css/fruitinput.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container container-shadow">
  <h2 class="text-center mb-4">Product Form</h2>
  <form id="productForm">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="productName">Product Name:</label>
          <input type="text" class="form-control" id="productName" required>
        </div>
        <div class="form-group">
          <label for="productImage">Product Image:</label>
          <input type="file" class="form-control-file" id="productImage" accept="image/*">
        </div>
        <div class="form-group">
          <label for="productCategory">Product Category:</label>
          <input type="text" class="form-control" id="productCategory" required>
        </div>
        <div class="form-group">
          <label for="productSection">Product Section:</label>
          <select class="form-select" id="productSection" required>
            <option value="" disabled selected>Select section</option>
            <option value="Seasonal">Seasonal</option>
            <option value="Yearly">Yearly</option>
            <option value="Special">Special</option>
          </select>
        </div>
        <div class="form-group">
          <label for="productWeight">Weight:</label>
          <input type="text" class="form-control" id="productWeight" required>
        </div>
        <div class="form-group">
          <label for="productPrice">Product Price:</label>
          <input type="number" class="form-control" id="productPrice" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="productDescription">Product Description:</label>
          <textarea class="form-control" id="productDescription" rows="3" required></textarea>
        </div>
        
        <div class="form-group">
          <label for="productOrigin">Origin:</label>
          <input type="text" class="form-control" id="productOrigin" required>
        </div>
        <div class="form-group">
          <label for="productQuality">Quality:</label>
          <input type="text" class="form-control" id="productQuality" required>
        </div>
        <div class="form-group">
          <label for="productCheck">Check:</label>
          <input type="text" class="form-control" id="productCheck" required>
        </div>
        <div class="form-group">
          <label for="productStock">Stock:</label>
          <input type="number" class="form-control" id="productStock" required>
        </div>
      </div>
    </div>
    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      <button type="button" class="btn btn-secondary btn-lg ml-2" onclick="window.history.back();">Cancel</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // JavaScript code for form submission, validation, etc. can be added here
</script>

</body>
</html>
