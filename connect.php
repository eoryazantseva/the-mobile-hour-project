<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$cust_email = $_POST['cust_email'];
$password = $_POST['password'];


<!-- Database connection -->

$conn = new mysqli('localhost','root','','themobilehour');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(firstName, lastName, cust_email, password)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$firstName, $lastName, $cust_email, $password);
    $stmt->execute();
    echo "Thank you for the registration";
    $stmt->close();
    $conn->close();
}
?>