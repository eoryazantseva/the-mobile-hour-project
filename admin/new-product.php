<?php include('form-manager.php') ?>

<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>


<div class="container my-5 pb-5">
    <h1 class="my-4 mx-0 text-uppercase">Create New Product</h1>
  <div class="row"> 
    <div class="col-12 col-md-9 col-lg-6">
  
  
      <form class="my-4 mb-sm-3" action="new-product.php" method="post" >

        <?php include('errors.php'); ?>

        <div class="mb-3">
          <label for="product_image" class="form-label ms-1" >Image</label>
          <input type="file" id="productImage" class="form-control" name="product_image" >
        </div>
         <div class="mb-3">
          <label for="product_id" class="form-label ms-1">ID</label>
          <input type="text" class="form-control"  name="product_id" required>
        </div>
        <div class="mb-3">
          <label for="product_name" class="form-label ms-1">Name</label>
          <input type="text" class="form-control"  name="product_name" required>
        </div>
        <div class="mb-3">
          <label for="product_model" class="form-label">Model</label>
          <input type="text" class="form-control" name="product_model" required>
        </div>
        <div class="mb-4">
          <label for="manufacturer" class="form-label">Manufacturer</label>
          <input type="text" class="form-control" name="manufacturer" required>
        </div>
        <div class="mb-4">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control" name="price" required>
        </div>
        <div class="mb-4">
          <label for="stock_on_hand" class="form-label">Stock</label>
          <input type="text" class="form-control" name="stock_on_hand" required>
        </div>
        <div class="mb-4">
          <label for="feature_id" class="form-label">Feature ID</label>
          <input type="text" class="form-control" name="feature_id" required>
        </div>
        <button type="submit" class="btn btn-primary text-uppercase" name="create_product">Create New Product</button>
      </form>
      </div>
   
</div>


  
</div>
