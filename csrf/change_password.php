<?php
// change_password.php

session_start();
include 'config/db_connection.php'; // DB connection details

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    
    // Vulnerable part: No CSRF protection and no proper input validation
    $query = "UPDATE users SET password = '$new_password' WHERE id = {$_SESSION['user_id']}";
    if ($conn->query($query)) {
        echo "<p>Password updated successfully!</p>";
    } else {
        echo "<p>Error updating password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: white;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
        }
        input[type="password"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Change Password</h1>
</header>

<div class="content">
    <form method="POST" action="change_password.php">
        <label for="new_password">Enter New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <button type="submit">Update Password</button>
    </form>
</div>

<footer>
    <p>&copy; 2024 Security Demo</p>
</footer>

</body>
</html>
