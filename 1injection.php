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
    <div class="container mt-5">
        <h1 class="mb-4">SQL injection vulnerable form</h1>
        <p>A SQL injection attack consists of insertion or “injection” of a SQL query via the input data from the client to the application. A successful SQL injection exploit can read sensitive data from the database, modify database data (Insert/Update/Delete), execute administration operations on the database (such as shutdown the DBMS), recover the content of a given file present on the DBMS file system and in some cases issue commands to the operating system. SQL injection attacks are a type of injection attack, in which SQL commands are injected into data-plane input in order to affect the execution of predefined SQL commands.</p>

        <!-- Form for user input -->
        <form method="POST" action="" class="mb-4" id="userForm">
            <div class="form-group">
                <label for="user_id">Enter User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
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
                <div class="alert alert-danger"><?php echo $error; ?></div>
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