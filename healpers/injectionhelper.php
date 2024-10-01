<?php
// Include the database connection file
include 'config\db_connection.php';

// Initialize variables to store the results
$users = [];
$error = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input (user ID)
    $id = $_POST['user_id'];

    // Unsafely construct the SQL query
    $query = "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check for errors in execution
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Fetch all results into the array
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row; // Store each row in the users array
            }
        } else {
            $error = "No user found with ID $id.";
        }
    } else {
        $error = "Error executing query.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>