<?php
// Predefined responses to simulate SQL injection attempts
$responses = [
    "' OR '1'='1" => "<div class='result'>Success: Logged in with payload '<strong>' OR '1'='1'</strong>.</div>",
    "' OR '1'='1' --" => "<div class='result'>Success: Logged in with payload '<strong>' OR '1'='1' --</strong>.</div>",
    "' OR 1=1 --" => "<div class='result'>Success: Logged in with payload '<strong>' OR 1=1 --</strong>.</div>",
    "' OR 'a'='a" => "<div class='result'>Success: Logged in with payload '<strong>' OR 'a'='a'</strong>.</div>",
    "' OR 1=1#" => "<div class='result'>Success: Logged in with payload '<strong>' OR 1=1#</strong>.</div>",
    "' OR ''='" => "<div class='result'>Success: Logged in with payload '<strong>' OR '''=''</strong>.</div>",
    "admin'--" => "<div class='result'>Success: Logged in with payload '<strong>admin'--</strong>.</div>",
    "' OR '1'='1' /*" => "<div class='result'>Success: Logged in with payload '<strong>' OR '1'='1' /*</strong>.</div>",
];

// Initialize the output
$output = "";
$success = false; // Flag to track if we found a successful injection

// Loop through the injections
foreach ($responses as $payload => $result) {
    if (!$success) { // Check if we haven't found a success yet
        // Simulate trying the injection
        $output .= "<p>Trying payload: <div class='query'>SELECT * FROM users WHERE username = '$payload' AND password = '$payload';</div></p>";
        
        // Simulate a successful injection
        $output .= $result; // Append simulated result
        
        // Set success to true and break out of the loop
        $success = true;
    }
}

// Simulate table data to display after a successful injection
$output .= "<h3>Table Data:</h3>";
$output .= "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
$output .= "<tr><td>1</td><td>admin</td><td>password123</td></tr>";
$output .= "<tr><td>2</td><td>user1</td><td>pass1</td></tr>";
$output .= "<tr><td>3</td><td>user2</td><td>pass2</td></tr>";
$output .= "</table>"; // Close the table

// Output the results
echo $output;
?>
