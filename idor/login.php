<?php
session_start();
$conn = new mysqli('localhost', 'tencho', 'Tencho@123!', 'syndicateone_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$redirect_url = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : 'index.php'; // Default to index.php if no redirect specified

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check credentials
    $stmt = $conn->prepare("SELECT id, username, password FROM user_idor_demo WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $db_username, $db_password);
    $stmt->fetch();

    if ($db_password === $password) { // In production, use password hashing and verify
        // Set session variables and redirect to the selected page
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $db_username;

        // Redirect to the chosen page (either vulnerable or secure)
        header("Location: $redirect_url");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        header, footer { background-color: #2e2e2e; color: white; text-align: center; padding: 10px 0; }
        form { text-align: center; margin-top: 50px; }
        input { margin: 10px; padding: 10px; width: 200px; }
        button { padding: 10px 20px; background-color: #3f51b5; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #303f9f; }
        footer { position: fixed; width: 100%; bottom: 0; }
        .tencho { padding: 10px 20px; background-color: #23a151; color: white; border: none; cursor: pointer; text-decoration: none }
    </style>
</head>
<body>

<header>
    <h1>IDOR Demo - Login</h1>
</header>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
    <p><?php if (isset($error)) { echo $error; } ?></p>
     <a href="index.php" class="tencho">Return to Base</a>
    
</form>
  
    

<footer>
    <p>Copyright to WAVES 2024</p>
</footer>

</body>
</html>
