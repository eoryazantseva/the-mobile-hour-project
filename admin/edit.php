<?php 

        $host    = 'localhost';
        $user    = 'u969596019_ryazantseva';
        $pass    = 'Osmandina!123';
        $db_name = 'u969596019_themobilehour';

                        //create connection

        $connection = new mysqli($host, $user, $pass, $db_name);


        $product_id = "";
        $product_name = "";
        $product_model = "";
        $manufacturer = "";
        $price = "";
        $stock_on_hand = "";
        $feature_id = "";


        $errorMessage = "";
        $successMessage = "";



        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                // GET method: Show the data of the client 
            if ( !isset($_GET[product_id])) {
                header("location: index.php");
                exit;
            }

            $product_id = $_GET["product_id"];

            // read the row of the selected product from database table

            $sql = "SELECT * FROM product WHERE product_id=$product_id";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();

            if (!row) {
                header("location: index.php");
                exit;
            }

            $product_name=$row["product_name"];
            $product_model = $row["product_model"];
            $manufacturer = $row["manufacturer"];
            $price = $row["price"];
            $stock_on_hand = $row["stock_on_hand"];
            $feature_id = $row["feature_id"];
            }

        else {

                // POST method: Update the data of the client

                $product_name= $_POST["product_name"];
                $product_model = $_POST["product_model"];
                $manufacturer = $_POST["manufacturer"];
                $price = $_POST["price"];
                $stock_on_hand = $_POST["stock_on_hand"];
                $feature_id = $_POST["feature_id"];


                do {
                    if (empty($product_name) || empty($product_model) || empty($manufacturer) || empty($price) || empty($stock_on_hand) || empty($feature_id)) {
                        $errorMessage = "All the fields are required";
                        break;
                    }

                    $sql = "UPDATE product" .
                    "SET product_name = '$product_name', product_model = '$product_model', manufacturer = '$manufacturer', price = '$price', stock_on_hand = '$stock_on_hand', feature_id = '$feature_id'" .
                    "WHERE product_id = $product_id";


                    $result = $connection->query($sql);

                    if(!$result) {
                        $errorMessage = "Invalid query: " . $connection->error;
                        break;
                    }
                    $successMessage = "Product updated";

                } while (false);

            }
            
?>
       
        <?php include "form-manager.php"?>
        <?php include "./templates/top.php"; ?>
        <?php include "./templates/navbar.php"; ?>


        <div class="container my-5">
        <h2>New product</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> $errorMessage</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"> </button>
                    </div>
            ";  }
        ?>




    <form method="post">
        <input type="hidden" value="<?php echo $product_id; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product name</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product model</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="product_model" value="<?php echo $product_model; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Manufacturer</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="manufacturer" value="<?php echo $manufacturer; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="price" value="<?php echo $price; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="stock_on_hand" value="<?php echo $stock_on_hand; ?>">
                </div>
        </div>
         <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Feature</label>
                <div class="col-sm-6">
                    <input type="text"class="form-control" name="feature_id" value="<?php echo $feature_id; ?>">
                </div>
        </div>

<?php 
if ( !empty($successMessage)) {
    echo "
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>$successMessage </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"> </button>

            </div>
        </div>
    </div>
    ";
}
?>


         <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>


</div>