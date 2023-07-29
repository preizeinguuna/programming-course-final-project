<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "BLOG_db";

// Establish database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
	die("Database connection failed: " . mysqli_connect_error());
}
?>
