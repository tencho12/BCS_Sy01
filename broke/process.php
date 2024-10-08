<?php
session_start();

// Helper functions
function getFailedLoginAttempts($username) {
    return isset($_SESSION['failed_attempts'][$username]) ? $_SESSION['failed_attempts'][$username] : 0;
}

function incrementFailedLoginAttempts($username) {
    $_SESSION['failed_attempts'][$username] = getFailedLoginAttempts($username) + 1;
}

// Verify CAPTCHA
function verifyCaptcha() {
    return isset($_POST['captcha']) && isset($_POST['captchaInput']) && $_POST['captcha'] === $_POST['captchaInput'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vulnerability = $_POST['vulnerability'];

    switch ($vulnerability) {
        case 'brute_force':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loginResult = "";

            $loginAttempts = getFailedLoginAttempts($username);

            // Account lockout after 5 failed attempts
            if ($loginAttempts >= 5) {
                $loginResult = "Brute force attack detected! Account temporarily blocked.";
            } else {
                // CAPTCHA verification
                if (!verifyCaptcha()) {
                    $loginResult .= "CAPTCHA verification failed!<br>";
                }

                // Simulate successful login (replace with your actual authentication)
                if ($username === 'admin' && $password === 'password123' && $loginAttempts < 3 && empty($loginResult)) {
                    $loginResult = "Login successful!";
                    unset($_SESSION['failed_attempts'][$username]); // Reset failed attempts
                } else {
                    $loginResult = "Invalid username or password.";
                    incrementFailedLoginAttempts($username);
                }
            }

            // Code examples for demonstration
            $vulnerableCode = '// Vulnerable login logic (no brute force protection)
if ($username === \'admin\' && $password === \'password123\') { 
    // Login successful!
} else {
    // Invalid username or password.
}';
            $mitigationCode = '// Account lockout
$loginAttempts = getFailedLoginAttempts($username);
if ($loginAttempts >= 3) {
    // Lock the account
}

// Rate limiting
if (isRateLimited($username)) {
    // Block the request
}

// CAPTCHA
if (!verifyCaptcha()) {
    // Block the request
}

// Strong password policy
if (!isValidPassword($password)) {
    // Reject weak password
}';

            $response = array(
                'message' => $loginResult,
                'code' => $vulnerableCode . "\n\nMitigation:\n" . $mitigationCode
            );

            echo json_encode($response);
            break;
    }
}
?>