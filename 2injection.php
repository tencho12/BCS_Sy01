<?php
// Include the database connection file
include 'config/db_connection.php';

// Initialize variables to store the results
$users = [];
$error = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input (user ID)
    $id = $_POST['user_id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE user_id = ?");

    // Bind the parameter to the statement
    $stmt->bind_param("s", $id); // Assuming user_id is a string; change "s" to "i" if it's an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch all results into the array
            while ($row = $result->fetch_assoc()) {
                $users[] = $row; // Store each row in the users array
            }
        } else {
            $error = "No user found with ID $id.";
        }
    } else {
        $error = "Error executing query.";
    }

    // Close the statement
    $stmt->close();
}

    // Close the connection
    $conn->close();
?>
<div class="container mt-5">
    <h1 class="mb-4">Secure SQL Injection Form</h1>
    <!-- Form for user input -->
    <form method="POST" action="" class="mb-4" id="userForm">
        <div class="form-group">
            <label for="user_id">Enter User ID:</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Fetch User Info</button>
    </form>

    <!-- Div to display the result -->
    <div>
        <?php if (!empty($users)): ?>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($id); ?></td>
                            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </div>
</div>
<script>
document.getElementById('userForm').addEventListener('submit', function() {
    // Reset the form after a short delay to allow for processing
    setTimeout(() => {
        this.reset();
    }, 100); // Adjust the delay as necessary
});
</script>
