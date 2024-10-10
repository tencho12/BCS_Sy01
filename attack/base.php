<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Demonstration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0a0a; /* Dark background */
            color: #b0c4de; /* Light blue text */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #003366; /* Dark blue header */
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #1a1a1a; /* Dark content area */
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
        footer {
            background-color: #333; /* Dark footer */
            color: white;
            text-align: center;
            padding: 10px;
        }
        input[type="button"] {
            background-color: #003366; /* Dark blue button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffcccc; /* Light red background for error messages */
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
        .query {
            font-family: monospace;
            background-color: #444; /* Dark background for query */
            padding: 10px;
            border-radius: 5px;
            color: #b0c4de; /* Light blue text for query */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #b0c4de; /* Light blue text for table */
        }
        th, td {
            padding: 10px;
            border: 1px solid #444; /* Dark border */
            text-align: left;
        }
        th {
            background-color: #003366; /* Dark blue header for table */
            color: white; /* White text for table headers */
        }
        .tenchobtn {
            background-color: green;
            padding: 7px;
            text-decoration: none;
            border-radius: 2px;
            color: white;
            margin-left:35%
        }
    </style>
</head>
<body>
    <header>
        <h1>SQL Injection Demonstration</h1>
    </header>

    <div class="content">
        <h3>Automated SQL Injection Simulation</h3>
        <p>Click the button to run the SQL injection simulation automatically.</p>
        <input type="button" id="vulnerablePage" value="Open Vulnerable Code ">
        <input type="button" id="startAttack" value="Run SQL Injection">
        
        <!-- <input type="button" id="homePage" value="Go to Homepage"> -->
        <a href="../index.php" class="tenchobtn">Go to Homepage</a>

        <div id="output"></div>
    </div>

    <footer>
        <p>&copy; 2024 SQL Injection Demo</p>
    </footer>

    <script>
        document.getElementById('startAttack').addEventListener('click', function() {
            // Clear previous output
            document.getElementById('output').innerHTML = '';

            // Create an XMLHttpRequest object to call the PHP script
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'inject.php', true);

            // Display results as they come in
            xhr.onprogress = function() {
                document.getElementById('output').innerHTML = xhr.responseText;
            };

            // Final callback after the attack finishes
            xhr.onload = function() {
                if (xhr.status == 200) {
                    document.getElementById('output').innerHTML += "<div><strong>SQL Injection Simulation Completed</strong></div>";
                } else {
                    document.getElementById('output').innerHTML += "<div>Error in execution</div>";
                }
            };

            xhr.send(); // Send the request to execute the SQL injection
        });

        // Event for the Vulnerable Code button
        document.getElementById('vulnerablePage').addEventListener('click', function() {
            window.location.href = 'index.php'; // Replace with the correct path for the vulnerable code page
        });

        // Event for the Homepage button
        document.getElementById('homePage').addEventListener('click', function() {
            window.location.href = 'home.php'; // Replace with the correct path for the homepage
        });
    </script>
</body>
</html>
