<?php
session_start();

// Return the score stored in session
echo json_encode([
    'score' => $_SESSION['score']
]);
?>
