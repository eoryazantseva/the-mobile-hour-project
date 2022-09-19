    <?php 

        $host    = 'localhost';
        $user    = 'u969596019_ryazantseva';
        $pass    = 'Osmandina!123';
        $db_name = 'u969596019_themobilehour';

                     
        $conn = mysqli_connect($host, $user, $pass, $db_name);
             
        // Check connection
        
        if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
         

        $product_id=$_GET['product_id'];
        $query=mysqli_query($conn, "SELECT * FROM `product` where product_id='$product_id'");
        $row=mysqli_fetch_array($query);

    ?>
       
       
        <?php include "./templates/top.php"; ?>
        <?php include "./templates/navbar.php"; ?>


        <div class="container my-5">
        <h2>Edit product</h2>

    <form method="POST" action="update.php?product_id=<?php echo $product_id; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product model</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_model" value="<?php echo $row['product_model']; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Manufacturer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="manufacturer" value="<?php echo $row['manufacturer']; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stock_on_hand" value="<?php echo $row['stock_on_hand']; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Feature</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="feature_id" value="<?php echo $row['feature_id']; ?>">
                </div>
        </div>


         <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>

</div>