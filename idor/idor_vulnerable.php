<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php?redirect_to=idor_vulnerable.php');
    exit();
}

$conn = new mysqli('localhost', 'tencho', 'Tencho@123!', 'idor_demo');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insecure Practice: Allow user to modify user ID in URL
// Get the user_id from the URL, allowing modification
$user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id']; // Insecure: This allows ID manipulation

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found!";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IDOR Vulnerable Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        header, footer { background-color: #2e2e2e; color: white; text-align: center; padding: 10px 0; }
        h3 { color: #333; text-align: center; }
        p { text-align: center; font-size: 18px; color: #555; }
        .logout-button { display: block; text-align: center; margin-top: 20px; }
        a.logout { background-color: #3f51b5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        a.logout:hover { background-color: #303f9f; }
        footer { position: fixed; width: 100%; bottom: 0; }
    </style>
</head>
<body>

<header>
    <h1>IDOR Demo</h1>
</header>

<h3>Welcome, <?php echo htmlspecialchars($user['username']); ?></h3>
<p>Your Account Balance: $<?php echo htmlspecialchars($user['account_balance']); ?></p>

<div class="logout-button">
    <a href="logout.php" class="logout">Logout</a>
    <a href="index.php" class="logout">Return Home</a>
</div>

<footer>
    <p>Copyright to WAVES 2024</p>
</footer>

</body>
</html>
