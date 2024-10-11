<?php
session_start();

// Simulate a logged-in user
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = true;
}

// Establish database connection
$conn = new mysqli('localhost', 'tencho', 'Tencho@123!', 'syndicateone_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Quiz questions
$questions = [
    [
        'vulnerable_code' => 'if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["password_new"])) { $new_password = $_POST["password_new"]; $sql = "UPDATE users SET password=\'$new_password\' WHERE username=\'admin\'"; if ($conn->query($sql) === TRUE) { echo "Password changed to: " . htmlspecialchars($new_password); }}',
        'options' => [
            'Use htmlspecialchars() to prevent CSRF',
            'Add CSRF token validation to form submission',
            'Use strip_tags() to prevent CSRF',
            'Use htmlentities() to prevent CSRF',
        ],
        'correct' => 1,
        'explanation' => 'Adding a CSRF token to the form and verifying it during the POST request ensures that only legitimate requests from the same session can submit the form, preventing CSRF attacks.'
    ],
    [
        'vulnerable_code' => '$sql = "UPDATE users SET password=\'$new_password\' WHERE username=\'admin\'";',
        'options' => [
            'Use md5() to hash the password',
            'Use mysqli_real_escape_string()',
            'Use prepared statements with parameter binding',
            'Use sha1() to hash the password',
        ],
        'correct' => 2,
        'explanation' => 'Using prepared statements with parameter binding ensures that user inputs are properly escaped and prevents SQL injection by separating SQL logic from data.'
    ],
    [
        'vulnerable_code' => '$sql = "UPDATE users SET password=\'$new_password\' WHERE username=\'admin\'";',
        'options' => [
            'Use password_hash() to store hashed passwords',
            'Use base64_encode() to encode the password',
            'Use htmlspecialchars() to secure password storage',
            'Store password as plain text',
        ],
        'correct' => 0,
        'explanation' => 'Using password_hash() securely hashes passwords before storing them, preventing attackers from retrieving plain-text passwords in case of a database breach.'
    ]
];

// Get the current question number from session or set to 0
$current_question = isset($_SESSION['current_question']) ? $_SESSION['current_question'] : 0;

// Handle form submission for quiz
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $selected_option = (int)$_POST['answer'];
    $is_correct = ($selected_option === $questions[$current_question]['correct']);
    
    if ($is_correct) {
        $feedback = '<p style="color:green">Correct! ' . $questions[$current_question]['explanation'] . '</p>';
    } else {
        $feedback = '<p style="color:red">Incorrect. </p>';
        $feedback .= '<p style="color:green">The correct answer is: ' . $questions[$current_question]['options'][$questions[$current_question]['correct']] . '</p>';
        $feedback .= '<p>' . $questions[$current_question]['explanation'] . '</p>';
    }

    // Move to the next question
    $_SESSION['current_question'] = ++$current_question;
} else {
    $feedback = '';
}

// Reset quiz when all questions are done
if ($current_question >= count($questions)) {
    $feedback = '<a href="csrf_secure.php"><button style="background-color:#28a745;color:white;padding:10px;border:none;border-radius:5px;cursor:pointer;">Go to Secure Page</button></a>';
    session_destroy();
} else {
    $question = $questions[$current_question];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Attack Simulation and Learning Hub</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; text-align: center; margin: 0; padding: 0; }
        .container { width: 80%; margin: 20px auto; }
        .header { background-color: #333; color: white; padding: 20px; font-size: 24px; border: 2px solid black; }
        .form-section, .vulnerable, .fix { margin: 20px 0; padding: 15px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; }
        .form-section h3, .vulnerable h2, .fix h2 { margin: 0 0 15px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .form-group input[type="submit"], .fix button { background-color: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
        .form-group input[type="submit"]:hover, .fix button:hover { background-color: #218838; }
        .feedback { margin-bottom: 20px; }
        .vulnerable pre { word-wrap: break-word; white-space: pre-wrap; background-color: #f5f5f5; padding: 10px; border-radius: 5px; overflow: hidden; }
    </style>
</head>
<body>
<div class="header">CSRF ATTACK SIMULATION AND LEARNING HUB</div>

<div class="container">
    <!-- Change Password Section at the top -->
    <div class="form-section">
        <h3>Change Password</h3>
        <?php
        if ($_SESSION['logged_in']) {
            // Check if it's a POST request and 'password_new' is set
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password_new']) && !isset($_POST['answer'])) {
                $new_password = $_POST['password_new'];

                // Update password in the database
                $sql = "UPDATE user_demo SET password='$new_password' WHERE username='admin'";
                if ($conn->query($sql) === TRUE) {
                    echo "Password changed to: " . htmlspecialchars($new_password);
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                // Show the form to change the password
                echo '<form method="POST" action="">
                        <div class="form-group">
                            <label for="password_new">New Password:</label>
                            <input type="text" id="password_new" name="password_new" required>
                        </div>
                        <input type="submit" value="Change Password">
                      </form>';
            }
        } else {
            echo "User not logged in.";
        }

        $conn->close();
        ?>
    </div>

    <!-- Quiz Section: Vulnerable Code and Fixing the Vulnerability -->
    <?php if ($current_question < count($questions)): ?>
        <div class="vulnerable">
            <h2>Vulnerable Code:</h2>
            <pre>
            <?php echo htmlspecialchars("<?php\n// Vulnerable code\n" . $question['vulnerable_code'] . "\n?>"); ?>
            </pre>
        </div>

        <div class="fix">
            <h2>Let's Fix the Vulnerability:</h2>
            <form method="POST" action="">
                <?php foreach ($question['options'] as $index => $option): ?>
                    <div>
                        <label>
                            <input type="radio" name="answer" value="<?php echo $index; ?>" required>
                            <?php echo htmlspecialchars($option); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Submit Answer</button>
            </form>
        </div>
    <?php endif; ?>

    <!-- Feedback Section -->
    <div class="feedback">
        <?php echo $feedback; ?>
    </div>
</div>
</body>
</html>
