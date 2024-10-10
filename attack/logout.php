<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the index page (or wherever you want)
header("Location: index.php");
exit();
?>
