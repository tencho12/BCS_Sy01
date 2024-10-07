<?php
// Include the database connection file
include 'config/db_connection.php';

// Get the post ID from the URL parameter (sanitize it for safety)
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($post_id > 0) {
    // Query the database for this post
    $query = "SELECT * FROM blog_posts WHERE id = $post_id";
    $result = mysqli_query($conn, $query);
    
    // Check if the post exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the post
        $post = mysqli_fetch_assoc($result);
    } else {
        // If no post is found, show an error message
        echo "Sorry, the post you are looking for does not exist.";
        exit;
    }
} else {
    echo "Invalid post ID.";
    exit;
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
    <meta name="author" content="SWAPT" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>WAVES - Be Aware, Be Secure</title>

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
    
    <!-- Start service Area -->
    <section class="service-area section-gap" id="vulnerabilities" data-animation="animated fadeInUp">
      <div class="container" style="margin-top: 40px;">
         <!-- Start Blog Post Area -->
  <section class="blog-post-area section-gap" id="single-post">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="single-post-content">
            <!-- Blog Title -->
            <h1 class="blog-post-title text-warning"><?php echo $post['title']; ?></h1>

            <!-- Meta Information -->
            <div class="blog-post-meta text-info">
              <span>By <?php echo $post['author']; ?> | </span>
              <span><?php echo $post['published_date']; ?></span>
            </div> <br/>

            <!-- Blog Content -->
            <div class="blog-post-content">
              <p><?php echo nl2br($post['content']); ?></p>
            </div>

            <!-- Back Button -->
            <a href="index.php" class="back-btn">Back to Blog</a>
          </div>
        </div>

        <!-- Sidebar (Optional, if needed) -->
        <div class="col-lg-3">
          <div class="sidebar">
       
            <h4>Related Posts</h4>
            <ul>
              <li class="mt-2"><a href="blog.php?id=4">Insecure Design</a></li>
              <li class="mt-2"><a href="blog.php?id=5">Identification and Authentication Failures</a></li>
              <li class="mt-2"><a href="blog.php?id=6">Vulnerable and Outdated Components</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Blog Post Area -->


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