<?php
$db = "";

function getConnection(){
	if($db="") {
		$db = mysqli_connect('localhost', 'u969596019_ryazantseva', 'Osmandina!123', 'u969596019_themobilehour');
	}
	return $db;
}

function autUser($login, $password) {

}
// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$firstName = "";
$lastName = "";
$cust_email = "";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'u969596019_ryazantseva', 'Osmandina!123', 'u969596019_themobilehour');

// Registration code
if (isset($_POST['reg_user'])) {

	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $cust_email = mysqli_real_escape_string($db, $_POST['cust_email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($firstName)) { array_push($errors, "First name is required"); }
    if (empty($lastName)) { array_push($errors, "Last name is required"); }
	if (empty($cust_email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// // Password encryption to increase data security
		// $password = md5($password_1);
		
		// Inserting data into table
		$query = "INSERT INTO customer (firstName, lastName, cust_email, password)
				VALUES('$firstName', '$lastName', '$cust_email', '$password_1')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['cust_email'] = $cust_email;
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: index.php');
	}
}

// User login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$cust_email = mysqli_real_escape_string($db, $_POST['cust_email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($cust_email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// // Password matching
		// $password = md5($password);
		
		$query = "SELECT * FROM `customer` WHERE cust_email='$cust_email' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['cust_email'] = $cust_email;

			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: index.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Email or password incorrect");
		}
	}
}

?>
