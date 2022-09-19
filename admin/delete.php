<?php
	$product_id=$_GET['product_id'];
	
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

	mysqli_query($conn,"DELETE FROM `product` where product_id='$product_id'");
	header('location:index.php');
?>