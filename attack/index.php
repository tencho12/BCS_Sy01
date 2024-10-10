<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Simulator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212; /* Dark background */
            color: #f1f1f1; /* Light text */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .container {
            background-color: #1e1e1e; /* Dark container */
            padding: 30px;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        h2 {
            margin-bottom: 20px;
            color: #28a745; /* Green heading for emphasis */
            font-size: 24px; /* Increased font size */
            text-transform: uppercase; /* Uppercase for styling */
            letter-spacing: 1px; /* Spacing for readability */
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #444; /* Darker border */
            background-color: #333; /* Dark input background */
            color: #f1f1f1; /* Light input text */
            transition: border 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #28a745; /* Green border on focus */
            outline: none;
        }
        input[type="submit"], .btn {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
            margin-top: 15px; /* Add vertical gap */
        }
        input[type="submit"]:hover, .btn:hover {
            background-color: #218838;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #bbb; /* Lighter footer text */
        }
        /* Animation on container hover */
        .container:hover {
            transform: translateY(-5px);
        }
        /* Styling for success message */
        .success-message {
            display: none; /* Hidden by default */
            margin-top: 20px;
            padding: 15px;
            background-color: #28a745; /* Green background */
            color: #fff; /* White text */
            border-radius: 8px;
            font-weight: bold;
            transition: opacity 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>SQL Injection Simulator</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <input type="button" class="btn" id="goToInjection" value="Go to Injection Page (base.php)">
        <div id="successMessage" class="success-message"></div> <!-- Success message container -->
        <form id="logoutForm" style="display: none; margin-top: 20px;">
            <input type="button" class="btn" value="Logout" onclick="logout()">
        </form>
    </div>

    <script>
        // Handle form submission using AJAX
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Create an XMLHttpRequest object to call the PHP script
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'process.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Display results based on response
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText); // Parse the JSON response
                    if (response.success) {
                        // Show success message
                        var successMessage = document.getElementById('successMessage');
                        successMessage.innerHTML = response.message; // Set the success message
                        successMessage.style.display = 'block'; // Show the message
                        successMessage.style.opacity = 1; // Fade in the message
                        // Show the logout button
                        document.getElementById('logoutForm').style.display = 'block';
                    } else {
                        // Show error message in a prompt
                        alert(response.message); // Show error message
                    }
                } else {
                    alert('Error in execution'); // Handle error
                }
            };

            // Send the request with form data
            xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
        });

        // Event for the Vulnerable Code button
        document.getElementById('goToInjection').addEventListener('click', function() {
            window.location.href = 'base.php'; // Redirect to base.php
        });

        // Logout function
        function logout() {
            window.location.href = 'logout.php'; // Redirect to logout.php to end the session
        }
    </script>
</body>
</html>
