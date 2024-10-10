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
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); // Escape the comment input

    // Insert the comment into the xss_demo.comments table
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
    <title>XSS Attack Simulation - Fix the Vulnerability</title>
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
        .form-section, .comments-section, .vulnerable-code-section {
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
        .comments-list p {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        .quiz-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        h3 {
            font-size: 22px;
        }
        .correct-answer {
            background-color: #d4edda;
            color: #155724;
            padding: 5px;
        }
        .wrong-answer {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px;
        }
        .secure-site-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .secure-site-button:hover {
            background-color: #218838;
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
    XSS Attack Simulation and Learning Hub
</div>
<div>
    <a href="http://localhost/BCS_Sy01/xss_overview.php" class="tenchoBTN">Return Home</a>
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
        <h3>Latest Comments (Vulnerable)</h3>
        <div class="comments-list">
            <?php
            if (!empty($comments)) {
                foreach ($comments as $comment): ?>
                    <p><?php echo $comment['comment_text'], ENT_QUOTES, 'UTF-8'; ?></p> 
                <?php endforeach;
            } else {
                echo "<p>No comments available</p>";
            }
            ?>
        </div>
    </div>

    <!-- Vulnerable Code Section -->
    <div class="box vulnerable-code-section">
        <h3>Vulnerable Code</h3>
        <pre id="code-section">
        <!-- Vulnerable code will be loaded here based on the quiz question -->
        </pre>
    </div>

    <!-- Let's Fix the Vulnerability (Quiz Section) -->
    <div class="quiz-section" id="quiz-section">
        <h3>Let's Fix the Vulnerability</h3>
        <div id="quiz-container">
            <!-- Questions will be dynamically inserted here -->
        </div>
        <div id="quiz-explanation" style="display:none;">
            <p id="explanation-text"></p>
            <button onclick="nextQuestion()">Next Question</button>
        </div>
    </div>
</div>

<script>
// Live preview functionality
document.getElementById('comment').addEventListener('input', function() {
    document.getElementById('livePreview').textContent = this.value;  // Render input safely
});

let currentQuestionIndex = 0;

const questions = [
    {
        question: "How can we protect input before storing it in the database?",
        options: [
            "$comment = $_POST['comment'];",
            "$comment = htmlentities($_POST['comment']);",
            "$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');",  // Correct answer
            "$comment = strip_tags($_POST['comment']);"
        ],
        codeSnippet: `
&lt;?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];  // Vulnerable code
    $query = "INSERT INTO comments (comment_text) VALUES ('$comment')";
?&gt;
        `,
        correctAnswer: 2,
        explanation: "We use `htmlspecialchars()` to sanitize user input by converting special characters like '<', '>', and '&' into HTML entities before storing it. This prevents harmful scripts from being inserted into the database."
    },
    {
        question: "How can we prevent XSS in the live preview?",
        options: [
            "document.getElementById('livePreview').innerHTML = commentValue;",  // Wrong
            "document.getElementById('livePreview').textContent = commentValue;",  // Correct
            "document.getElementById('livePreview').innerText = commentValue;",
            "document.getElementById('livePreview').value = commentValue;"
        ],
        codeSnippet: `
document.getElementById('livePreview').innerHTML = commentValue;  // Vulnerable code
        `,
        correctAnswer: 1,
        explanation: "By using `textContent`, we ensure that any input entered by the user is rendered as plain text rather than interpreted as HTML. This prevents any script tags from executing in the browser's DOM."
    },
    {
        question: "How do we secure comments when displaying them on the page?",
        options: [
            "echo $comment['comment_text'];",  // Wrong
            "echo htmlspecialchars($comment['comment_text'], ENT_QUOTES, 'UTF-8');",  // Correct
            "echo htmlentities($comment['comment_text']);",
            "echo strip_tags($comment['comment_text']);"
        ],
        codeSnippet: `
<div class="comments-list">
    &lt;?php foreach ($comments as $comment): ?&gt;
        &lt;p&gt;&lt;?php echo $comment['comment_text']; ?&gt;&lt;/p&gt;  // Vulnerable code
    &lt;?php endforeach; ?&gt;
</div>
        `,
        correctAnswer: 1,
        explanation: "We use `htmlspecialchars()` to encode special characters like `<` and `>` so that they are displayed as plain text and not executed as HTML or JavaScript. This mitigates XSS attacks."
    }
];

function loadQuestion(index) {
    const quizContainer = document.getElementById("quiz-container");
    const question = questions[index];
    
    let questionHTML = `<p>${question.question}</p>`;
    for (let i = 0; i < question.options.length; i++) {
        questionHTML += `
            <input type="radio" name="quiz" id="option${i}" value="${i}">
            <label for="option${i}" id="label${i}">${question.options[i]}</label><br>
        `;
    }
    questionHTML += `<button onclick="submitAnswer()">Submit</button>`;
    
    quizContainer.innerHTML = questionHTML;
    document.getElementById('code-section').textContent = question.codeSnippet;
}

function submitAnswer() {
    const selectedOption = document.querySelector('input[name="quiz"]:checked');
    
    if (!selectedOption) {
        alert("Please select an answer!");
        return;
    }

    const answerIndex = parseInt(selectedOption.value);
    const correctAnswerIndex = questions[currentQuestionIndex].correctAnswer;
    const explanationText = questions[currentQuestionIndex].explanation;

    // Clear any previous highlights
    for (let i = 0; i < questions[currentQuestionIndex].options.length; i++) {
        document.getElementById(`label${i}`).classList.remove('correct-answer', 'wrong-answer');
    }

    // Highlight the correct and selected options
    if (answerIndex === correctAnswerIndex) {
        document.getElementById(`label${answerIndex}`).classList.add('correct-answer');
    } else {
        document.getElementById(`label${answerIndex}`).classList.add('wrong-answer');
        document.getElementById(`label${correctAnswerIndex}`).classList.add('correct-answer');
    }

    // Show explanation in the same div
    document.getElementById("quiz-explanation").style.display = "block";
    document.getElementById("explanation-text").textContent = explanationText;
}

function nextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        document.getElementById("quiz-explanation").style.display = "none";
        loadQuestion(currentQuestionIndex);
    } else {
        document.getElementById("quiz-container").innerHTML = '<button class="secure-site-button" onclick="goToSecureSite()">Go to Secure Site</button>';
    }
}

function goToSecureSite() {
    window.location.href = '2xss.php';  // Replace with the actual secure page URL
}

// Load the first question
loadQuestion(currentQuestionIndex);
</script>

</body>
</html>
