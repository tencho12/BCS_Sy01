<?php
// Include the database connection file
include 'config/db_connection.php';

// Fetch the latest 5 comments from the database securely
$query = "SELECT * FROM comments ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$comments = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }
}

// Handle form submission and insert the comment into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); // Escape the comment input
    $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'); // Sanitize the input to prevent XSS

    // Insert the sanitized comment into the database
    $query = "INSERT INTO comments (comment) VALUES ('$comment')";
    if (mysqli_query($conn, $query)) {
        // Reload the page to avoid resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure XSS Prevention Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        .box {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-section, .comments-section {
            width: 100%;
            margin-bottom: 20px;
        }
        .comments-list p {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="header">
    Secure XSS Prevention Demo
</div>

<div class="container">
    <!-- Secure Comment Submission Form -->
    <div class="box form-section">
        <h3>Submit a Comment</h3>
        <p>Enter a comment below (XSS safe):</p>
        <form method="POST" action="" id="commentForm">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <button type="submit">Submit Comment</button>
        </form>
    </div>

    <!-- Display Latest Comments (Secure) -->
    <div class="box comments-section">
        <h3>Latest Comments (Secure)</h3>
        <div class="comments-list">
            <?php
            if (!empty($comments)) {
                foreach ($comments as $comment): ?>
                    <p><?php echo htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach;
            } else {
                echo "<p>No comments available</p>";
            }
            ?>
        </div>
    </div>

</div>

<script>
// Secure Live Preview functionality
document.getElementById('comment').addEventListener('input', function() {
    var preview = document.getElementById('livePreview');
    preview.textContent = this.value;  // Render input as text to prevent script execution
});
</script>

</body>
</html>
