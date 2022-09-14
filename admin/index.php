<?php 
session_start();  
if (!isset($_SESSION['username'])) {
  header("location:admin-login.php");
}
?>
<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>

<div class="main">
    <h2>Products</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th> <i class="fa-regular fa-image"></i></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Feature</th>
                </tr>
            </thead>
            <tbody id="product_list">
                <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>sit</td>
                </tr>
            </tbody>
            </table>
        </div>
        <a href="new-product.php" role="button" class="btn btn-secondary"> Create New </a>

</div>
