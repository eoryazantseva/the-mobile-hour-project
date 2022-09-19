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
 
	$product_name=$_POST['product_name'];
    $product_model=$_POST['product_model'];
    $manufacturer=$_POST['manufacturer'];
    $price=$_POST['price'];
    $stock_on_hand=$_POST['stock_on_hand'];
    $feature_id=$_POST['feature_id'];

 
	mysqli_query($conn,"UPDATE `product` SET product_name='$product_name', product_model='$product_model', manufacturer='$manufacturer', price='$price', stock_on_hand='$stock_on_hand',  where userid='$id', feature_id='$feature_id'");
	header('location:index.php');
?>