<?php
$host = "localhost";  // Change this if using an online database
$username = "root";   // Change to your database username
$password = "";       // Change to your database password
$database = "school_admissions";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
