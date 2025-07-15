<?php
	// Database configuration
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "Z23_Beauty_Salon";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>