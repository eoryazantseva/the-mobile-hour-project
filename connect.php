<?php

if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["cust_email"]) && isset($_POST["password"])) {
      
    $conn = new mysqli("localhost", "u969596019_ryazantseva", "Osmandina!123", "u969596019_themobilehour");
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $firstName = $conn->real_escape_string($_POST["firstName"]);
    $lastName = $conn->real_escape_string($_POST["lastName"]);
    $cust_email = $conn->real_escape_string($_POST["cust_email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $sql = "INSERT INTO customer (firstName, lastName, cust_email, password) VALUES ('$firstName', '$lastName', '$cust_email', '$password')";
    if($conn->query($sql)){
        echo "Data stored in a database successfully";
    } else{
        echo "ERROR: " . $conn->error;
    }
    $conn->close();
}

?>