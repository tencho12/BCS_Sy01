<?php
// Start the session
session_start();
include 'config/db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
} else {
    echo "User is logged in with ID: " . $_SESSION['user_id'];
}

// Check if score, vulnerability, and user_id are available
if (isset($_POST['score']) && isset($_POST['vulnerability']) && isset($_SESSION['user_id'])) {
    $score = intval($_POST['score']);
    $user_id = $_SESSION['user_id'];
    $vulnerability = $_POST['vulnerability'];

    // Prepare SQL to update the score if it exists, otherwise insert a new one
    $sql = "SELECT id FROM score_tb WHERE userid = ? AND vulnerability = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $vulnerability);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing score
        $update_sql = "UPDATE score_tb SET score = ? WHERE userid = ? AND vulnerability = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("iis", $score, $user_id, $vulnerability);
        if ($update_stmt->execute()) {
            echo "Score updated successfully!";
        } else {
            echo "Error updating score: " . $update_stmt->error;
        }
    } else {
        // Insert new score
        $insert_sql = "INSERT INTO score_tb (userid, vulnerability, score) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isi", $user_id, $vulnerability, $score);
        if ($insert_stmt->execute()) {
            echo "Score inserted successfully!";
        } else {
            echo "Error inserting score: " . $insert_stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Missing score or user_id.";
}
?>
