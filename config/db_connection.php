<?php
// db_connection.php

$servername = "localhost";
$username = "tencho";  // Replace with your DB username
$password = "Tencho@123!";      // Replace with your DB password
$dbname = "syndicateone_db";  // Replace with your DB name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
