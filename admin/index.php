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


                <?php
                $host    = 'localhost';
                $user    = 'u969596019_ryazantseva';
                $pass    = 'Osmandina!123';
                $db_name = 'u969596019_themobilehour';

                //create connection
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $connection = mysqli_connect($host, $user, $pass, $db_name);

                //get results from database
                $result = mysqli_query($connection, "SELECT * FROM product");
                $all_property = array();  //declare an array for saving property

                //showing property
                echo '<table class="table">
                    <thead>
                        <tr>';  //initialize table tag
                        while ($property = mysqli_fetch_field($result)) {
                            echo '<th scope="col">' . $property->name . '</th>';  //get field name for header
                            $all_property[] = $property->name;  //save those to array
                            }
                        echo '</tr>
                    /thead>'; //end tr tag


                    echo '<tbody>';
                    //showing all data
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            foreach ($all_property as $item) {
                                echo '<td>' . $row[$item] . '</td>'; //get items using property value
                            }
                            echo '</tr>
                    </tbody>';
                                    }
                echo "</table>";

                mysqli_close($connection);
                ?>
            </div>

        </div>
    </div>

