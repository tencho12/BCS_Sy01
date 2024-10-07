<?php
session_start();

// If no quiz data exists in the session, redirect to the quiz page
if (!isset($_SESSION['question_index'])) {
    header('Location: quiz.php');
    exit;
}

// Get the user's score
$score = $_SESSION['score'];
$totalQuestions = count(json_decode(file_get_contents('quiz\xss.json'), true));

// Destroy session data after the quiz ends
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .result-container { width: 60%; margin: 0 auto; padding: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Quiz Result</h1>
        <p>Your score: <?php echo $score; ?> out of <?php echo $totalQuestions; ?></p>
        <p><?php echo $score == $totalQuestions ? "Congratulations! You answered all questions correctly!" : "Better luck next time!"; ?></p>
        <a href="quiz.php">Try Again</a>
    </div>
</body>
</html>
