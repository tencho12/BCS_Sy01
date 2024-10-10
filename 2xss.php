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

// Handle form submission and insert the sanitized comment into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['comment']), ENT_QUOTES, 'UTF-8'); // Escape the comment input

    // Insert the sanitized comment into the xss_demo.comments table
    $query = "INSERT INTO comments (comment_text) VALUES ('$comment')";
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
    <title>Secure XSS Attack Simulation - XSS Prevention</title>
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
            margin-top: 10px
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
        .live-preview p {
            font-size: 18px;
            margin: 0;
        }
        .warning-section {
            margin-top: 10px;
            font-weight: bold;
            color: red;
        }
        .comments-list p {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        .no-warning {
            color: green;
        }
        .tenchoBTN {
          background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="header">
    Secure XSS Attack Simulation
</div>
<div>
    <a href="http://localhost/BCS_Sy01/xss_overview.php" class="tenchoBTN">Return Home</a>
</div>

<div class="container">
    <!-- XSS Attack Simulation Form -->
    <div class="box form-section">
        <h3>XSS Attack Simulation</h3>
        <p>Type a comment to test the XSS prevention:</p>
        <form method="POST" action="" id="commentForm">
            <div class="form-group">
                <label for="comment">Enter your comment:</label>
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <!-- Submit button -->
            <button type="submit">Submit Comment</button>
            <!-- Add button to link to vulnerable page -->
            <button type="button" onclick="window.location.href='1xss.php'" style="background-color: orange; color: white; padding: 10px 15px; border: none; cursor: pointer; margin-left: 10px;">Go to Vulnerable Page</button>
        </form>

        <!-- Live Preview Section -->
        <div class="live-preview">
            <h3>Live Preview</h3>
            <p id="livePreview"></p>
        </div>

        <!-- Warning Section -->
        <div class="warning-section" id="warningSection">
            <!-- Warning message will be dynamically inserted here -->
        </div>
    </div>

    <!-- Latest Comments Section -->
    <div class="box comments-section">
        <h3>Latest Comments (Sanitized)</h3>
        <div class="comments-list">
            <?php
            if (!empty($comments)) {
                foreach ($comments as $comment): ?>
                    <p><?php echo htmlspecialchars($comment['comment_text'], ENT_QUOTES, 'UTF-8'); ?></p> 
                <?php endforeach;
            } else {
                echo "<p>No comments available</p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
// Live preview and warning functionality
document.getElementById('comment').addEventListener('input', function() {
    const commentValue = this.value;
    const livePreview = document.getElementById('livePreview');
    const warningSection = document.getElementById('warningSection');

    // Sanitize the live preview to display user input as plain text
    livePreview.textContent = commentValue;

    // XSS detection logic for the warning system
    let warningMessage = "No suspicious code detected";
    let hasSuspiciousCode = false;

    if (/<script>/i.test(commentValue)) {
        warningMessage = "Warning: Detected potential XSS attack via script tag!";
        hasSuspiciousCode = true;
    } else if (/<\/?[^>]+>/i.test(commentValue)) {
        warningMessage = "Warning: Detected potential XSS attack via HTML tag!";
        hasSuspiciousCode = true;
    } else if (/on\w+\s*=\s*['"]?javascript:[^'"]+/i.test(commentValue)) {
        warningMessage = "Warning: Detected XSS attack via event attributes (onerror, onload, etc.)!";
        hasSuspiciousCode = true;
    } else if (/document\.cookie|window\.location/i.test(commentValue)) {
        warningMessage = "Warning: Detected JavaScript-based data access (e.g., document.cookie)!";
        hasSuspiciousCode = true;
    }

    // Update the warning section
    if (hasSuspiciousCode) {
        warningSection.textContent = warningMessage;
        warningSection.classList.remove('no-warning');
    } else {
        warningSection.textContent = "No suspicious code detected";
        warningSection.classList.add('no-warning');
    }
});
</script>

</body>
</html>
