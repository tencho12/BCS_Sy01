<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Include the database connection
include 'config/db_connection.php';

// Retrieve user details from the session variables
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

// Fetch quiz results from the score table
$query = "SELECT * FROM score_tb WHERE userid = '$user_id' ORDER BY date_taken DESC";
$result = mysqli_query($conn, $query);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch all users and their total quiz scores
$user_score_query = "
    SELECT u.user, u.first_name, u.last_name, SUM(s.score) as total_score
    FROM users u
    JOIN score_tb s ON u.user_id = s.userid
    GROUP BY u.user_id
    ORDER BY total_score DESC
";
$user_score_result = mysqli_query($conn, $user_score_query);

// Check for errors in the query
if (!$user_score_result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta charset="UTF-8" />
    <title>WAVES® - User Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/linearicons.css" />
    <link rel="stylesheet" href="css/tencho.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body id="home">
    <?php include 'header.php'; ?>

    <div class="pt-60"></div>
    <section class="service-area section-gap pb-20" id="login-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- <h1>Welcome, <?php echo $first_name . ' ' . $last_name; ?>!</h1> -->
                    <h2 class="py-2">Welcome, <span class="text-info"><?php echo $first_name . ' ' . $last_name; ?>!</span> </h2>
                    <!-- <p><strong>Username:</strong> <?php echo $username; ?></p> -->

                    <!-- Display User Information -->
                    <p><strong>Full Name:</strong> <?php echo $first_name . ' ' . $last_name; ?></p>

                    <!-- Quiz Results -->
                     <br/><br/>
                    <h2 class="text-warning">Your Quiz Results</h2><br/>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Quiz Name</th>
                                    <th>Score</th>
                                    <th>Date Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['vulnerability']); ?></td>
                                        <td><?php echo htmlspecialchars($row['score']); ?></td>
                                        <td><?php echo htmlspecialchars($row['date_taken']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No quiz results found.</p>
                    <?php endif; ?>

                    <!-- All Users Quiz Scores -->
                     <br/>
                    <h2 class="text-warning">All Users Leaderboard</h2><br/>
                    <?php if (mysqli_num_rows($user_score_result) > 0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user_row = mysqli_fetch_assoc($user_score_result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user_row['user']); ?></td>
                                        <td><?php echo htmlspecialchars($user_row['first_name'] . ' ' . $user_row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($user_row['total_score']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No users have taken the quiz yet.</p>
                    <?php endif; ?>

                    <!-- Logout Button -->
                    <form action="logout.php" method="POST">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
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
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
