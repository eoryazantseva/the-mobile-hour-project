<?php

$servername = "localhost";
$database = "u969596019_themobilehour";
$username = "u969596019_ryazantseva";
$password = "Osmandina!123";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


// Taking al 4 values from the form data(input)

$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$cust_email = $_REQUEST['cust_email'];
$password = $_REQUEST['password'];

// Performing insert query execution

$sql = "INSERT INTO customer VALUES ('$firstName','$lastName','$cust_email','$password')";

if(mysqli_query($conn, $sql)){
    echo "<h3> data stored in a database successfully <h3>"
} else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}

// Close connection

mysqli_close($conn);
?>