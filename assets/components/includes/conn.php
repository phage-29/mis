<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "Password@123!";
$database = "mis";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Handle the exception
    die("Error: " . $e->getMessage());
}
