<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brute Force Attack Simulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="button"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="button"]:hover {
            background-color: #2980b9;
        }

        .output-container {
            margin-top: 30px;
            padding: 15px;
            background-color: #ecf0f1;
            border-left: 5px solid #3498db;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            color: #2c3e50;
        }

        .code-box {
            margin-top: 30px;
            padding: 20px;
            background-color: #e1e5ea;
            border-left: 5px solid #7f8c8d;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            white-space: pre-wrap;
            word-wrap: break-word;
            display: none; /* Initially hidden */
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .failed {
            color: red;
            font-weight: bold;
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 14px;
            background-color: #e1e5ea;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Brute Force Attack Simulation</h2>

    <form id="attackForm">
        <input type="button" id="startAttack" value="Run Brute Force Attack">
    </form>

    <div class="output-container">
        <h3>Output:</h3>
        <div id="output"></div>
    </div>

    <div class="code-box" id="codeBox">
        <h3>PowerShell Script:</h3>
        <pre id="psScript"></pre>
    </div>
</div>


<script>
document.getElementById('startAttack').addEventListener('click', function() {
    // Clear previous output
    document.getElementById('output').innerHTML = '';

    // Hide the PowerShell script initially
    document.getElementById('codeBox').style.display = 'none';

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request to your PHP file
    xhr.open('GET', 'loop.php', true);

    // When the server responds, display output
    xhr.onprogress = function() {
        document.getElementById('output').innerHTML = xhr.responseText;
    };

    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById('output').innerHTML += "<div><strong>Attack Finished</strong></div>";
            
            // Now show the PowerShell script once the attack is finished
            document.getElementById('codeBox').style.display = 'block';
            
            // Fetch and display the PowerShell script
            fetch('C:\wamp64\www\BCS_Sy01\broke\brute.ps1')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('psScript').textContent = data;
                })
                .catch(error => {
                    document.getElementById('psScript').textContent = "Error loading script.";
                });
        } else {
            document.getElementById('output').innerHTML += "<div>Error in execution</div>";
        }
    };

    xhr.send(); // Send the request
});
</script>

</body>
</html>
