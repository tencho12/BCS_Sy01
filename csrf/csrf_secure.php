<?php
session_start();

// Initialize the $message variable to prevent undefined variable warning
$message = "";

// Generate a CSRF token if not already present
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password_csrf_demo'])) {
    // Check if CSRF token is present and valid
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $message = "CSRF Attack Failed: Invalid token.";
    } else {
        // Sanitize the new password
        $new_password = htmlspecialchars($_POST['password_csrf_demo']);

        // Update the password in the csrf_demo MySQL database
        try {
            // Connect to MySQL database (adjust the credentials as per your setup)
            $db = new PDO('mysql:host=localhost;dbname=syndicateone_db', 'tencho', 'Tencho@123!');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Update password in the 'users' table for the user with id = 1 (or change condition as needed)
            $stmt = $db->prepare("UPDATE user_demo SET password = :new_password WHERE id = 2");
            $stmt->bindParam(':new_password', $new_password);
            if ($stmt->execute()) {
                $message = "Password successfully changed in csrf_demo.users!";
            } else {
                $message = "Failed to change the password in csrf_demo.users.";
            }
        } catch (PDOException $e) {
            $message = "Connection failed: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Secure</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container {
            background-color: #1e1e1e;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        h1, h3 {
            margin-bottom: 20px;
            color: #28a745;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        .container:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CSRF DEMONSTRATION</h1>
        <h3>Secure Page</h3>
        <p><?php echo $message; ?></p>
        
        <!-- Add Change Password Form for csrf_demo.users -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="password_csrf_demo">New Password (csrf_demo.users):</label>
                <input type="password" id="password_csrf_demo" name="password_csrf_demo" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>
