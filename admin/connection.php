<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "u969596019_themobilehour";
	$username = "u969596019_ryazantseva";
	$password = "Osmandina!123";

	$conn = new PDO(
		"mysql:host=$servername; dbname=geeksforgeeks",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
