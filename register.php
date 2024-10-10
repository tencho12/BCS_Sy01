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
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password using PHP's password_hash() function
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Set default values for avatar, last_login, and failed_login
        $avatar = "default-avatar.png"; // Assuming you have a default avatar
        $last_login = date("Y-m-d H:i:s"); // Setting the current date and time
        $failed_login = 0; // Initially, failed login attempts are set to 0

        // Construct the SQL query (with the hashed password)
        $query = "INSERT INTO users (first_name, last_name, user, password, avatar, last_login, failed_login) 
                  VALUES ('$first_name', '$last_name', '$username', '$hashed_password', '$avatar', '$last_login', '$failed_login')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            $success = "User registered successfully!";
        } else {
            $error = "Error executing query: " . mysqli_error($conn);
        }
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
    <title>WAVES® - User Registration</title>

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

  <body id="home">
    <?php include 'header.php'; ?>

    <div class="pt-60"></div>
    <section class="service-area section-gap pb-20" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 header-text">
            <h1>User Registration</h1>
          </div>
        </div>

        <!-- Feedback Messages -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 col-md-8">
            <!-- Success Message -->
            <?php if (!empty($success)): ?>
              <div class="alert alert-success">
                <?php echo $success; ?>
              </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (!empty($error)): ?>
              <div class="alert alert-danger">
                <?php echo $error; ?>
              </div>
            <?php endif; ?>

            <!-- Registration Form -->
            <form action="" method="POST" class="form-area">
              <!-- First Name -->
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter your first name">
              </div>

              <!-- Last Name -->
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your last name">
              </div>

              <!-- Username -->
              <div class="form-group">
                <label for="user">Username:</label>
                <input type="text" class="form-control" id="user" name="user" required placeholder="Enter your username">
              </div>

              <!-- Password -->
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
              </div>

              <!-- Confirm Password (for signup) -->
              <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Sign Up</button>

              <!-- Login Link -->
              <div class="form-group text-center mt-3">
                <p>Already have an account? <a href="login.php">Login here</a></p>
              </div>
            </form>
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
  </body>
</html>
