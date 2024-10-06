<?php
// Include the database connection file
include 'config/db_connection.php';

// Fetch the latest 5 comments from the database
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
    // Get the comment input (without sanitization)
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); // Prevent SQL injection, but still vulnerable to XSS

    // Insert the raw comment into the comments table (no sanitization, vulnerable to XSS)
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
    <title>XSS Attack Simulation - Insecure Version</title>
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
        .live-preview {
            border: 1px solid #ced4da;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
            margin-top: 10px;
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
    XSS Attack Simulation - Insecure Version
</div>

<div class="container">
    <!-- XSS Attack Simulation Form -->
    <div class="box form-section">
        <h3>XSS Attack Simulation</h3>
        <p>Type a comment with a script to simulate an XSS attack:</p>
        <form method="POST" action="" id="commentForm">
            <div class="form-group">
                <label for="comment">Enter your comment with script</label>
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <button type="submit">Submit Comment</button>
        </form>
        <div class="live-preview">
            <h3>Live Preview</h3>
            <p id="livePreview"></p>
        </div>
    </div>

    <!-- Latest Comments Section -->
    <div class="box comments-section">
        <h3>Latest Comments (Insecure)</h3>
        <div class="comments-list">
            <?php
            if (!empty($comments)) {
                foreach ($comments as $comment): ?>
                    <!-- Vulnerable to XSS: Directly echoing the comment without any sanitization -->
                    <p><?php echo $comment['comment']; ?></p> <!-- No escaping of special characters -->
                <?php endforeach;
            } else {
                echo "<p>No comments available</p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
// Live preview functionality
document.getElementById('comment').addEventListener('input', function() {
    document.getElementById('livePreview').innerHTML = this.value;  // This is also vulnerable to XSS (using innerHTML directly)
});
</script>

</body>
</html>
