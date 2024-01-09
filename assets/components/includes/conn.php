<?php

// Database credentials
$hostname = "localhost";
$username = "root";
$password = "Password@123!";
$database = "misdb";

try {
    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Handle the exception
    die("Error: " . $e->getMessage());
}

$website = "MSG-IT";

$chkdb = "SELECT * FROM users";
$result = $conn->execute_query($chkdb);
if (!$result->num_rows) {
    $adduser = "INSERT INTO users(`Username`,`Password`,`RoleID`) values(?,?,?)";
    $result = $conn->execute_query($adduser, ['root', password_hash('password', PASSWORD_DEFAULT), '5']);
}
