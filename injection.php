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

    // Unsafely construct the SQL query
    $query = "SELECT first_name, last_name, password FROM users WHERE user_id = '$id';";
    
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
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" />
    <!-- Author Meta -->
    <meta name="author" content="WAVES®" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>WAVES®</title>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet"
    />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css" />
    <link rel="stylesheet" href="css/tencho.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/full_width_animated_layers_008.css" />
    <link rel="stylesheet" href="css/main.css" />
    <style>
        .hidden { display: none; }
    </style>
  </head>

  <body id="home">
    <?php include 'header.php'; ?>

    <br/><br/><br/><br/>
    
 <!-- Start of the Page Content -->
    <section class="container mt-5">
        <!-- Form for user input -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Insecure SQL Injection Form</h1>
                <form method="POST" action="" class="mb-4" id="userForm">
                    <div class="form-group">
                        <label for="user_id">Enter User ID:</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Fetch User Info</button>
                </form>
            </div>
        </div>

         <!-- User Info Table -->
        <?php if (!empty($users)): ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Fetched User Information</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($id); ?></td>
                            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['password']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php elseif (!empty($error)): ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            </div>
        </div>
        <?php endif; ?>

       <!-- Card displaying vulnerability information -->
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-danger text-white">
                  <h5 class="card-title">Vulnerability: SQL Injection</h5>
              </div>
              <div class="card-body">
                    <p class="card-text text-dark">
                        The code below is vulnerable to SQL Injection, a security vulnerability that allows attackers to interfere with the queries that your application makes to its database. 
                        In this case, an attacker could manipulate the SQL query by injecting malicious code through the user input (`user_id` field).
                    </p>
                    
                    <!-- Vulnerable Code Example -->
                    <div class="alert alert-warning">
                        <strong>Vulnerable Code:</strong>
                        <pre><code>
                        // Unsafely constructed SQL query
                        $query = "SELECT first_name, last_name, password FROM users WHERE user_id = '$id';";
                        $result = mysqli_query($conn, $query);
                        </code></pre>
                    </div>

                    <p class="card-text">
                        To prevent this, we should use prepared statements with bound parameters. This method separates the SQL query structure from the user input, preventing malicious input from altering the query logic.
                    </p>
              </div>
        </div>
      </div>
    </div>

    <!-- MCQ Section to Fix the Vulnerability -->
    <div class="row mt-5">
      <div class="col-md-12">
        <h2>MCQ: How to Fix SQL Injection</h2>
        <p>Choose the correct method to prevent SQL Injection:</p>

          <form id="mcqForm">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mcq" id="option1" value="A">
                    <label class="form-check-label" for="option1">A) Use string concatenation to build SQL queries.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mcq" id="option2" value="B">
                    <label class="form-check-label" for="option2">B) Use prepared statements with bound parameters.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mcq" id="option3" value="C">
                    <label class="form-check-label" for="option3">C) Allow the database to automatically sanitize the input.</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit Answer</button>
          </form>
          <!-- Result Message -->
          <div id="result" class="mt-3 hidden">
            <p id="resultText"></p>
            <a id="resultText" href="injection_secure.php" class="btn btn-success">Test Secure Form</a>
          </div>
      </div>
    </div>
    </section>


  <?php include 'footer.php'; ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/paradise_slider_min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/tencho_injection.js"></script>
       <script>
        // Function to check MCQ answers
        document.getElementById('mcqForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const correctAnswer = 'B'; // Correct answer is B
            const selectedAnswer = document.querySelector('input[name="mcq"]:checked');

            const resultText = document.getElementById('resultText');
            const resultDiv = document.getElementById('result');

            if (selectedAnswer) {
                if (selectedAnswer.value === correctAnswer) {
                    resultText.innerText = 'Correct! You selected the right option (B). Prepared statements with bound parameters are the secure way to avoid SQL Injection.';
                } else {
                    resultText.innerText = 'Incorrect. The correct answer is B. Using prepared statements with bound parameters prevents SQL Injection.';
                }
                resultDiv.classList.remove('hidden');
            } else {
                resultText.innerText = 'Please select an option.';
                resultDiv.classList.remove('hidden');
            }
        });
    </script>

  </body>
</html>
