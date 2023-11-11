<?php
// Define your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_kishan_insurance";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
