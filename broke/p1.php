<?php
// ... (Helper functions - same as before)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vulnerability = $_POST['vulnerability'];

  switch ($vulnerability) {
    case 'brute_force':
      // ... (Brute force code with CAPTCHA verification and account lockout - same as before)
      break;

    case 'vulnerable_login':
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Vulnerable login logic (no brute force protection, no account lockout, no CAPTCHA)
      if ($username === 'admin' && $password === 'password123') {
        $loginResult = "Login successful!";
      } else {
        $loginResult = "Invalid username or password.";
      }

      $response = array('message' => $loginResult);
      echo json_encode($response);
      break;
  }
}
?>