<?php 
session_start();  
if (!isset($_SESSION['username'])) {
  header("location:admin-login.php");
}
?>
<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>



  <div class="row mt-5">
        <?php include "./templates/sidebar.php"; ?>
        <div class="col-md-10 bg-white main mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <h2>Product List</h2>
                    </div>
                    <div class="col-2">
                        <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
                    </div>
                </div>
                
                
                

                <!--Create table-->
                
    <?php
                $host    = 'localhost';
                $user    = 'u969596019_ryazantseva';
                $pass    = 'Osmandina!123';
                $db_name = 'u969596019_themobilehour';

                //create connection
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $conn = mysqli_connect($host, $user, $pass, $db_name);
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);
                ?>
<table class="table">
  <tr>
    
    <th>ID</th>
    <th>Name</th>
    <th>Model</th>
    <th>Manufacturer</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Feature</th>
    <th> Action</th>
  </tr>
<?php
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
  
   <td><?php echo $data['product_id']; ?> </td>
   <td><?php echo $data['product_name']; ?> </td>
   <td><?php echo $data['product_model']; ?> </td>
   <td><?php echo $data['manufacturer']; ?> </td>
   <td><?php echo $data['price']; ?> </td>
   <td><?php echo $data['stock_on_hand']; ?> </td>
   <td><?php echo $data['feature_id']; ?> </td>
   <td> 
    <a class="btn btn-primary btn-sm" href="#">Update</a>
    <a class="btn btn-danger btn-sm" href="#">Delete</a>
   </td>
 <tr>

 <?php } ?>
 </table>
              
            </div>

        </div>
    </div>



