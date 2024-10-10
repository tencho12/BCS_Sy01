<?php
// Start the session
session_start();

// Destroy the session and clear all session variables
session_unset();
session_destroy();

// Redirect the user to the index (home) page after logout
header("Location: index.php");
exit();
