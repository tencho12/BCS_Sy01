<?php
session_start();

$questions = [
    ['question' => 'What is 2+2?', 'answers' => ['3', '4', '5', '6'], 'correct_answer' => '4'],
    ['question' => 'What is the capital of France?', 'answers' => ['Berlin', 'Madrid', 'Paris', 'Rome'], 'correct_answer' => 'Paris']
];

// Get data from AJAX
$questionIndex = $_POST['question_index'];
$selectedAnswer = $_POST['selected_answer'];

// Check if the selected answer is correct
$isCorrect = $selectedAnswer == $questions[$questionIndex]['correct_answer'];

// Update session score
if ($isCorrect) {
    $_SESSION['score']++;
}

// Return the updated score and whether the answer was correct
echo json_encode([
    'isCorrect' => $isCorrect,
    'updatedScore' => $_SESSION['score']
]);


?>