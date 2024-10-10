<?php
// Include the database connection file
include 'config/db_connection.php';

// Initialize variables to store the result and error message
$error = "";
$success = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input (first name, last name, username, password)
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Set default values for avatar, last_login, and failed_login
    $avatar = "default-avatar.png"; // Assuming you have a default avatar
    $last_login = date("Y-m-d H:i:s"); // Setting the current date and time
    $failed_login = 0; // Initially, failed login attempts are set to 0

    // Unsafely construct the SQL query (No password hashing as per your request)
    $query = "INSERT INTO users (first_name, last_name, user, password, avatar, last_login, failed_login) 
              VALUES ('$first_name', '$last_name', '$username', '$password', '$avatar', '$last_login', '$failed_login')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        $success = "User registered successfully!";
    } else {
        $error = "Error executing query: " . mysqli_error($conn);
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
    <!-- Start service Area -->
    <section class="service-area" id="vulnerabilities" data-animation="animated fadeInUp">
      <div class="container">
        <div class="container mt-5">
          <h2 class="mb-4">Insecure hashed password</h2>

          <!-- Form for username, first name, last name, and password input -->
          <form method="POST" action="" class="mb-4" id="userForm">
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" required />
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" required />
                </div>
                <div class="form-group">
                  <label for="user">Username:</label>
                  <input type="text" class="form-control" id="user" name="user" required />
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" required />
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
          </form>

              <!-- Display result or error message -->
          <div>
            <?php if (!empty($success)): ?>
              <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php elseif (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="card-title">Vulnerability: Insecure Cryptographic Failure (Plain-Text Password Storage)</h5>
                    </div>
                    <div class="card-body">
                          <p class="card-text text-dark">
                              The code below is vulnerable to Insecure Cryptographic Failure. In this case, the application stores user passwords in plain text in the database without any hashing. 
                              This creates a significant security risk, as attackers who gain access to the database can easily retrieve user passwords and compromise accounts.
                          </p>
                          
                          <!-- Vulnerable Code Example -->
                          <div class="alert alert-warning">
                              <strong>Vulnerable Code:</strong>
                              <pre><code>
                              // Storing password in plain-text without hashing
                              $password = $_POST['password'];
                              $query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
                              $result = mysqli_query($conn, $query);
                              </code></pre>
                          </div>

                          <p class="card-text">
                              To prevent this, passwords should always be securely hashed before storing them in the database. A common and recommended approach is to use PHP's `password_hash()` function to create a hashed version of the password, and `password_verify()` to check the password during login.
                          </p>

                          <p class="card-text">
                              Without properly hashing passwords, any breach of the database could expose all user credentials, leading to serious security risks.
                          </p>
                    </div>
              </div>
            </div>
          </div>
          <!-- quiz part from here -->
           <!-- Quiz Section: Insecure Cryptographic Failure -->
        <div class="row mt-5">
          <div class="col-md-12">
              <h2>Quiz: Insecure Cryptographic Failure (Plain-Text Password Storage)</h2>
              <p>Answer the following questions to test your understanding of the insecure cryptographic failure vulnerability:</p>

              <!-- MCQ 1: Question about storing passwords -->
              <form id="quizForm">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="mcq1" id="option1a" value="A">
                      <label class="form-check-label" for="option1a">A) Storing user passwords in plain text is acceptable if the database is secured with strong access controls.</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="mcq1" id="option1b" value="B">
                      <label class="form-check-label" for="option1b">B) Storing passwords in plain text is insecure and should never be done.</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="mcq1" id="option1c" value="C">
                      <label class="form-check-label" for="option1c">C) It's okay to store passwords in plain text as long as they are encrypted in transit.</label>
                  </div>

                  <!-- MCQ 2: Question about password hashing -->
                  <div class="form-check mt-4">
                      <input class="form-check-input" type="radio" name="mcq2" id="option2a" value="A">
                      <label class="form-check-label" for="option2a">A) Password hashing should be avoided as it is unnecessary if a secure password policy is enforced.</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="mcq2" id="option2b" value="B">
                      <label class="form-check-label" for="option2b">B) Password hashing should be done using strong algorithms like bcrypt before storing passwords in the database.</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="mcq2" id="option2c" value="C">
                      <label class="form-check-label" for="option2c">C) Password hashing is not necessary as long as the password is stored in an encrypted column.</label>
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Submit Quiz</button>
              </form>

              <div id="quizResult" class="mt-3 hidden">
                <p id="quizResultText"></p>
                <a href="crypto_secure.php" class="btn btn-success">Test Secure Form</a>
              </div>
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
    <script src="js/tencho_cryptofail.js"></script>
    <script>
      // Handle the quiz form submission
      document.getElementById('quizForm').addEventListener('submit', function(event) {
          event.preventDefault();

          const correctAnswers = {
              mcq1: 'B', // Correct answer for MCQ 1
              mcq2: 'B'  // Correct answer for MCQ 2
          };

          const mcq1Answer = document.querySelector('input[name="mcq1"]:checked');
          const mcq2Answer = document.querySelector('input[name="mcq2"]:checked');

          let resultMessage = '';
          let score = 0;

          // Check MCQ 1
          if (mcq1Answer && mcq1Answer.value === correctAnswers.mcq1) {
              score++;
          } else {
              resultMessage += 'MCQ 1 is incorrect. Storing passwords in plain text is always insecure.\n';
          }

          // Check MCQ 2
          if (mcq2Answer && mcq2Answer.value === correctAnswers.mcq2) {
              score++;
          } else {
              resultMessage += 'MCQ 2 is incorrect. Password hashing should be done using strong algorithms like bcrypt.\n';
          }

          // Show the result
          const resultText = document.getElementById('quizResultText');
          const resultDiv = document.getElementById('quizResult');

          if (score === 2) {
              resultText.innerText = 'Congratulations! You have answered both questions correctly.';
          } else {
              resultText.innerText = resultMessage || 'Some answers are incorrect. Try again!';
          }
          resultDiv.classList.remove('hidden');
      });
    </script>

  </body>
</html>
