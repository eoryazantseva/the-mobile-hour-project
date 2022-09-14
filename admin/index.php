<?php 
session_start();  
if (!isset($_SESSION['username'])) {
  header("location:admin-login.php");
}
?>
<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>



  <div class="row">
    <?php include "./templates/sidebar.php"; ?>
    <div class="col-md-10 bg-white main">

      <div class="row">
      	  <div class="col-10">
      		  <h2>Product List</h2>
      	  </div>
      	  <div class="col-2">
      		  <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
      	  </div>
        </div>

<?php

    $con=mysqli_connect('localhost', 'u969596019_ryazantseva', 'Osmandina!123', 'u969596019_themobilehour');
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM product");

    echo "<table class='table table-striped table-sm' border='1'>
        <tr>
            <th>Name</th>
            <th>Model</th>
            <th>Manufacturer</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Feature</th>
            <th>Action</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
        echo "<td>" . $row['Manufacturer'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>" . $row['Stock'] . "</td>";
        echo "<td>" . $row['Feature'] . "</td>";
        echo "<td>" . $row['Action'] . "</td>";
        echo "</tr>";
        }
      echo "</table>";

mysqli_close($con);
?>













        <!-- <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th> <i class="fa-regular fa-image"></i></th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Feature</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="product_list">
                <tr>
                    <td><img src="../images/iPhoneX.jpg" alt=""></td>
                    <td>Huawei Y6s (Dual Sim 4G, 6.09", 64GB/3GB) - Orchid Blue</td>
                    <td>JAT-LX3</td>
                    <td>Huawei</td>
                    <td>$329</td>
                    <td>$20</td>
                    <th>Feature1</th>
                    <th><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></th>
                </tr>
            </tbody>
            </table>
        </div>
        <a href="new-product.php" role="button" class="btn btn-secondary"> Create New </a> -->

    </div>

    </div>

