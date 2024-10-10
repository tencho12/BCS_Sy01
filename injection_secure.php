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

  </head>

  <body>
    <!-- Start service Area -->
    <section class="service-area" id="vulnerabilities" data-animation="animated fadeInUp">
      <div class="container" style="margin-top: 40px;">
          <div class="container mt-5">
            <h1 class="mb-4">Secure SQL Injection Form</h1>
            <!-- Form for user input -->
            <form method="POST" action="" class="mb-4" id="userForm">
              <div class="form-group">
                  <label for="user_id">Enter User ID:</label>
                  <input type="number" class="form-control" id="user_id" name="user_id" required>
              </div>
              <button type="submit" class="btn btn-primary">Fetch User Info</button>
              <a href="index.php" class="btn btn-warning ml-3">Return Home</a>
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
        </div>
      </div>
    </section>
        <script>
          function checkAnswers() {
          const answers = {
              q1: 'B',
              q2: 'C',
              q3: 'A'
          };

          let score = 0;
          const totalQuestions = Object.keys(answers).length;

          for (let question in answers) {
              const userAnswer = document.querySelector(`input[name="${question}"]:checked`);
              if (userAnswer && userAnswer.value === answers[question]) {
                  score++;
              }
          }

          const resultText = document.getElementById('resultText');
          
          // Reset the result display
          document.getElementById('result').classList.add('hidden');

          if (score === totalQuestions) {
              // Only display the result if all answers are correct
              resultText.innerText = `Congratulations! You scored ${score} out of ${totalQuestions}.`;
              document.getElementById('result').classList.remove('hidden');
          } else {
              // Provide feedback if not all answers are correct
              resultText.innerText = `You scored ${score} out of ${totalQuestions}. Try again!`;
          }
      }
      </script>

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


  </body>
</html>
