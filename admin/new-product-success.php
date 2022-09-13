<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: admin-login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['cust_email']);
	header("location: customer-login.php");
}
?>

<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>

<?php if (isset($_SESSION['username'])) : ?>
			


            <p>
				<strong>
					<?php echo $_SESSION['username']; ?>
				</strong> !
			</p>


		<?php endif ?>