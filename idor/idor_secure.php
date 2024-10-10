<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php?redirect_to=idor_secure.php');
    exit();
}

$conn = new mysqli('localhost', 'tencho', 'Tencho@123!', 'syndicateone_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Secure Practice: Ignore URL ID manipulation, use session-stored user_id
$user_id = $_SESSION['user_id']; // Always use the user_id stored in the session

$sql = "SELECT * FROM user_idor_demo WHERE id = $user_id";
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
    <title>IDOR Secure Page</title>
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
</div>

<footer>
    <p>Copyright to WAVES 2024</p>
</footer>

</body>
</html>
