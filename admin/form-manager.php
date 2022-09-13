<?php
session_start();


if (!isset($_SESSION['username'])) {
  header("location:admin-login.php");
}

// Declaring and hoisting the variables
$product_id = "";
$product_name = "";
$product_model = "";
$manufacturer = "";
$price = "";
$stock_on_hand = "";
$feature_id = "";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'u969596019_ryazantseva', 'Osmandina!123', 'u969596019_themobilehour');

// Registration code
if (isset($_POST['create_product'])) {

	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$product_id = mysqli_real_escape_string($db, $_POST['product_id']);
	$product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $product_model = mysqli_real_escape_string($db, $_POST['product_model']);
	$manufacturer = mysqli_real_escape_string($db, $_POST['manufacturer']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
    $stock_on_hand = mysqli_real_escape_string($db, $_POST['stock_on_hand']);
    $feature_id = mysqli_real_escape_string($db, $_POST['feature_id']);
  

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($product_id)) { array_push($errors, "Product ID name is required"); }
    if (empty($product_name)) { array_push($errors, "Product name is required"); }
	if (empty($product_model)) { array_push($errors, "Product model is required"); }
	if (empty($manufacturer)) { array_push($errors, "Manufacturer is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }
    if (empty($stock_on_hand)) { array_push($errors, "Stock is required"); }
    if (empty($feature_id)) { array_push($errors, "Feauture ID is required"); }


	// If the form is error free, then create a new product
	if (count($errors) == 0) {
		
		// // Password encryption to increase data security
		// $password = md5($password_1);
		
		// Inserting data into table
		$query = "INSERT INTO product (product_id, product_name, product_model, manufacturer, price, stock_on_hand, feature_id)
				VALUES('$product_id', '$product_name', '$product_model', '$manufacturer', '$price', '$stock_on_hand', '$feature_id')";
		
		mysqli_query($db, $query);



        // message
		$_SESSION['success'] = "You added a new product!";

        header('location: new-product-success.php');
	}
}

// // User login
// if (isset($_POST['login_user'])) {
	
// 	// Data sanitization to prevent SQL injection
// 	$cust_email = mysqli_real_escape_string($db, $_POST['cust_email']);
// 	$password = mysqli_real_escape_string($db, $_POST['password']);

// 	// Error message if the input field is left blank
// 	if (empty($cust_email)) {
// 		array_push($errors, "Email is required");
// 	}
// 	if (empty($password)) {
// 		array_push($errors, "Password is required");
// 	}

// 	// Checking for the errors
// 	if (count($errors) == 0) {
		
// 		// // Password matching
// 		// $password = md5($password);
		
// 		$query = "SELECT * FROM `customer` WHERE cust_email='$cust_email' AND password='$password'";
// 		$results = mysqli_query($db, $query);

// 		// $results = 1 means that one user with the
// 		// entered username exists
// 		if (mysqli_num_rows($results) == 1) {
			
// 			// Storing username in session variable
// 			$_SESSION['cust_email'] = $cust_email;

			
// 			// Welcome message
// 			$_SESSION['success'] = "You have logged in!";
			
// 			// Page on which the user is sent
// 			// to after logging in
// 			header('location: index.php');
// 		}
// 		else {
			
// 			// If the username and password doesn't match
// 			array_push($errors, "Email or password incorrect");
// 		}
// 	}
// }

?>
