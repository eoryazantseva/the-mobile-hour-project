<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$username = "";
$password = "";
$errors = array();
$_SESSION['success'] = "";


// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'u969596019_ryazantseva', 'Osmandina!123', 'u969596019_themobilehour');


if (isset($_POST['login_admin'])) {
	
	// Data sanitization to prevent SQL injection
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}	

	// Checking for the errors
	if (count($errors) == 0) {
		
		$query = "SELECT * FROM `adminlogin` WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);


		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['username'] = $username;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: adminpage.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Email or password incorrect");
		}
	}
}

// include_once('connection.php');

// function test_input($data) {
	
// 	$data = trim($data);
// 	$data = stripslashes($data);
// 	$data = htmlspecialchars($data);
// 	return $data;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
// 	$username = test_input($_POST["username"]);
// 	$password = test_input($_POST["password"]);
// 	$stmt = $conn->prepare("SELECT * FROM adminlogin");
// 	$stmt->execute();
// 	$users = $stmt->fetchAll();
	
// 	foreach($users as $user) {
		
// 		if(($user['username'] == $username) &&
// 			($user['password'] == $password)) {
// 				header("location: adminpage.php");
// 		}
// 		else {
// 			echo "<script language='javascript'>";
// 			echo "alert('WRONG INFORMATION')";
// 			echo "</script>";
// 			die();
// 		}
// 	}
// }

?>

