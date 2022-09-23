<?php
    $ini_array = parse_ini_file(__DIR__."/../.conf.ini", true);
    session_start();
    $access = false;
    $currentAdminUser = null;
    if( !empty( $_SESSION['currentUser'] ) ){
        $currentAdminUser = (array)json_decode( $_SESSION['currentUser'] );
    }
    $arRole = explode(",", $ini_array['role']['rolesAdmin']);
    if( !empty($currentAdminUser) && !empty($currentAdminUser['role']) ){
        $arRoleUser = explode(",", $currentAdminUser['role']);
        foreach ( $arRoleUser as $roleUser ){
            if( in_array( $roleUser, $arRole ) ){
                $access = true;
                break;
            }
        }
    }
    require ($_SERVER['DOCUMENT_ROOT']."/header.php");

    if( !$access ){
        echo "У вас нет прав для доступа к этому разделу";
        echo "<br /><a href='/admin/admin-login.php'>Авторизоватся под админом</a>";
        die();
    }else{ ?>

        <?php include "./templates/top.php"; ?>
        <?php include "./templates/navbar.php"; ?>

          <div class="row">
                <?php include "./templates/sidebar.php"; ?>
                <div class="col-md-10 bg-white main mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <h2>Product List</h2>
                            </div>
                            <div class="col-2">
                                <a href="new-product.php" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
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
    <? } ?>
<?require ($_SERVER['DOCUMENT_ROOT']."/footer.php");?>
