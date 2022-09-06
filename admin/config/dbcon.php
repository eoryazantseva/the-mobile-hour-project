<?php
$host = "localhost";
$username = "u969596019_ryazantseva";
$password = "Osmandina!123";
$database = "u969596019_themobilehour";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
    header("Location: ../errors/dberror.php");
    die();
}


?>