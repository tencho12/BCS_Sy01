<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
        }
        h2, p, label {
            color: #ffffff;
        }
        #codePreview {
            border: 1px solid #444;
            background-color: #1e1e1e;
            color: #00ff00;
            padding: 15px;
            font-family: monospace;
            white-space: pre-wrap;
            max-height: 200px; /* Set a max height for visibility */
            overflow-y: auto; /* Enable vertical scrolling */
        }
        input[type="text"], input[type="password"] {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
            padding: 5px;
            margin: 5px 0;
        }
        button {
            background-color: #00bcd4;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px; /* Add margin for spacing */
        }
        button:hover {
            background-color: #008c9e;
        }
        .question {
            margin-bottom: 15px;
        }
        #captchaBox {
            background-color: #333;
            color: #00bcd4;
            font-weight: bold;
            padding: 5px;
            display: inline-block;
            margin: 10px 0;
        }
        #captchaRefresh {
            cursor: pointer;
            color: #00bcd4;
            margin-left: 10px;
        }
        #quizResult {
            margin: 10px 0;
            text-align: center;
        }
        .nav-button {
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Login Security Quiz</h2>
    <p class="text-center">Answer these questions to see how we improve the security of a login form step by step:</p>

    <h2 class="mt-4">Vulnerable Code Preview</h2>
    <div id="codePreview"></div>

    <h2>Quiz</h2>
    <form id="quizForm">
        <div id="question1" class="question">
            <p>1. What is the minimum password length you should enforce to avoid weak passwords?</p>
            <label><input type="radio" name="q1" value="a"> a) 6 characters</label><br>
            <label><input type="radio" name="q1" value="b"> b) 8 characters</label><br>
            <label><input type="radio" name="q1" value="c"> c) 12 characters</label><br>
            <label><input type="radio" name="q1" value="d"> d) 10 characters</label><br>
            <button type="button" class="btn btn-primary mt-2" onclick="checkAnswer(1)">Check Answer</button>
        </div>
        <div id="question2" class="question" style="display:none;">
            <p>2. How can you limit the number of login attempts to mitigate brute force attacks?</p>
            <label><input type="radio" name="q2" value="a"> a) Rate limiting</label><br>
            <label><input type="radio" name="q2" value="b"> b) Account suspension</label><br>
            <label><input type="radio" name="q2" value="c"> c) Two-factor authentication</label><br>
            <label><input type="radio" name="q2" value="d"> d) IP blacklisting</label><br>
            <button type="button" class="btn btn-primary mt-2" onclick="checkAnswer(2)">Check Answer</button>
        </div>
        <div id="question3" class="question" style="display:none;">
            <p>3. Why should passwords be hashed before storing them? Which algorithm is commonly used for secure password hashing?</p>
            <label><input type="radio" name="q3" value="a"> a) To improve performance</label><br>
            <label><input type="radio" name="q3" value="b"> b) To prevent password leaks, using bcrypt</label><br>
            <label><input type="radio" name="q3" value="c"> c) To speed up password comparisons</label><br>
            <label><input type="radio" name="q3" value="d"> d) To support multiple users</label><br>
            <button type="button" class="btn btn-primary mt-2" onclick="checkAnswer(3)">Check Answer</button>
        </div>
        <div id="question4" class="question" style="display:none;">
            <p>4. How does CAPTCHA help in preventing automated brute force attacks?</p>
            <label><input type="radio" name="q4" value="a"> a) By identifying bots from humans</label><br>
            <label><input type="radio" name="q4" value="b"> b) By making the login form more complex</label><br>
            <label><input type="radio" name="q4" value="c"> c) By increasing CPU load for attackers</label><br>
            <label><input type="radio" name="q4" value="d"> d) By preventing multiple sessions</label><br>
            <div id="captchaBox">AB12X</div>
            <span id="captchaRefresh" onclick="refreshCaptcha()" style="color: #00bcd4; cursor: pointer;">Refresh CAPTCHA</span>
            <input type="text" id="captchaInput" placeholder="Enter CAPTCHA" class="form-control mt-2">
            <button type="button" class="btn btn-primary mt-2" onclick="checkAnswer(4)">Check Answer</button>
        </div>
    </form>

    <div id="quizResult"></div>
    <div class="nav-button">
        <button class="btn btn-success" onclick="location.href='secure.php'">Go to Secure Page</button>
        <button class="btn btn-info" onclick="location.href='../index.php';">Go to Home Page</button>

    </div>
</div>

<script>
    let codeSnippet = ''; // Initialize as an empty string

    // Default vulnerable code snippet to be displayed initially
    function setInitialCode() {
        codeSnippet = `// Vulnerable login logic (no password length check, no rate limiting, no account lockout, no hashing, no CAPTCHA)
if ($username === 'admin' && $password === 'password123') { 
    // Login successful!
} else {
    // Invalid username or password.
}`;
        document.getElementById('codePreview').textContent = codeSnippet;
    }

    setInitialCode(); // Call to set the initial code

    function checkAnswer(questionNumber) {
        const quizResult = document.getElementById('quizResult');

        if (questionNumber === 1) {
            if (document.querySelector('input[name="q1"]:checked').value === 'b') {
                quizResult.textContent = "Correct!";
                codeSnippet = `// Secure login with minimum password length check
if (strlen($password) >= 8) {
    if ($username === 'admin' && $password === 'password123') {
        // Login successful!
    } else {
        // Invalid username or password.
    }
}`;
                document.getElementById('codePreview').textContent = codeSnippet;
                document.getElementById('question1').style.display = 'none';
                document.getElementById('question2').style.display = 'block';
            } else {
                quizResult.textContent = "Incorrect. Please try again.";
            }
        } else if (questionNumber === 2) {
            if (document.querySelector('input[name="q2"]:checked').value === 'a') {
                quizResult.textContent = "Correct!";
                codeSnippet = `// Secure login with rate limiting and account lockout
if (strlen($password) >= 8 && checkRateLimit($username)) {
    if ($username === 'admin' && $password === 'password123') {
        // Login successful!
    } else {
        // Increment failed attempts
        incrementFailedAttempts($username);
        if (getFailedAttempts($username) >= 5) {
            // Lock account for 5 minutes
            lockAccount($username);
        }
    }
}`;
                document.getElementById('codePreview').textContent = codeSnippet;
                document.getElementById('question2').style.display = 'none';
                document.getElementById('question3').style.display = 'block';
            } else {
                quizResult.textContent = "Incorrect. Please try again.";
            }
        } else if (questionNumber === 3) {
            if (document.querySelector('input[name="q3"]:checked').value === 'b') {
                quizResult.textContent = "Correct!";
                codeSnippet = `// Secure login with bcrypt password hashing
if (strlen($password) >= 8 && checkRateLimit($username)) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    if (password_verify($password, $hashedPassword)) {
        // Login successful!
    } else {
        // Increment failed attempts
        incrementFailedAttempts($username);
        if (getFailedAttempts($username) >= 5) {
            // Lock account for 5 minutes
            lockAccount($username);
        }
    }
}`;
                document.getElementById('codePreview').textContent = codeSnippet;
                document.getElementById('question3').style.display = 'none';
                document.getElementById('question4').style.display = 'block';
            } else {
                quizResult.textContent = "Incorrect. Please try again.";
            }
        } else if (questionNumber === 4) {
            const captchaInput = document.getElementById('captchaInput').value;
            // Generating a random CAPTCHA for validation
            const correctCaptcha = document.getElementById('captchaBox').textContent;
            if (captchaInput === correctCaptcha && document.querySelector('input[name="q4"]:checked').value === 'a') {
                quizResult.textContent = "Correct!";
                codeSnippet = `// Secure login with CAPTCHA, rate limiting, account lockout, and bcrypt hashing
if (strlen($password) >= 8 && checkRateLimit($username) && verifyCaptcha($captchaInput)) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    if (password_verify($password, $hashedPassword)) {
        // Login successful!
    } else {
        // Increment failed attempts
        incrementFailedAttempts($username);
        if (getFailedAttempts($username) >= 5) {
            // Lock account for 5 minutes
            lockAccount($username);
        }
    }
}`;
                document.getElementById('codePreview').textContent = codeSnippet;
                showLoginSuccessPopup();
            } else {
                quizResult.textContent = "Incorrect CAPTCHA. Please try again.";
            }
        }
    }

    function refreshCaptcha() {
        const randomCaptcha = Math.random().toString(36).substring(2, 7).toUpperCase();
        document.getElementById('captchaBox').textContent = randomCaptcha; // Update the CAPTCHA with a new random string
        document.getElementById('captchaInput').value = ''; // Clear previous input
    }

    function showLoginSuccessPopup() {
        alert("Login successful!");
    }
</script>
</body>
</html>
