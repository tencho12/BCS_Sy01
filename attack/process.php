<?php
// Start the session
session_start();

// Database connection settings
$servername = "localhost";  // Your database server (e.g., localhost)
$dbname = "syndicateone_db";  // Your database name
$dbusername = "tencho";  // Your database username
$dbpassword = "Tencho@123!";  // Your database password (leave blank if no password)

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input values from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Vulnerable SQL Query (Unsafe concatenation of user inputs)
$query = "SELECT * FROM user_demo WHERE username = '$username' AND password = '$password'";

// Execute the query
$result = $conn->query($query);

// Check the results
if ($result->num_rows > 0) {
    // Login successful
    $_SESSION['username'] = $username; // Set session variable
    echo json_encode(["success" => true, "message" => "Login successful!"]);
} else {
    // Login failed
    echo json_encode(["success" => false, "message" => "Invalid username or password."]);
}

// Close connection
$conn->close();
?>
