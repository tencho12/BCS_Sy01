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
    <title>WAVES® - Be Aware, Be Secure</title>

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

    <!-- <div class="mt-50"></div> -->
    <!-- Start service Area -->
     <div class="pt-60"></div>
     <section class="service-area section-gap" id="vulnerabilities">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8 header-text">
              <h2>INSECURE DIRECT OBJECT REFERENCE (IDOR)</h2><br/>
            </div>
          </div>
          <div>
            <p style="line-height: 1.7; font-size: 15px">
              Insecure Direct Object References (IDOR) is a security vulnerability that occurs when an application exposes a reference to an internal object, such as a file, database record, or URL, without proper authorization checks. This allows an attacker to manipulate the input parameters to gain unauthorized access to sensitive data or functionality, bypassing normal access controls. IDOR typically arises in web applications where users can change identifiers in URLs or form fields, allowing them to view or modify other users' data. There are two primary types of IDOR: horizontal IDOR, where an attacker accesses data belonging to another user at the same permission level (e.g., viewing another user's profile), and vertical IDOR, where an attacker accesses data meant for users with higher privileges (e.g., admin features). To mitigate IDOR vulnerabilities, developers should implement robust access controls, validate user permissions for each request, and avoid exposing internal object identifiers directly in the application.
            </p>
          </div>
        </div>
      </section>
    <section class="service-area" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-20 header-text">
            <h1>WATCH IDOR VIDEOS</h1>
            <p>Insecure direct object references</p>
          </div>
        </div>
        <div class="row">
          <div
            class="col-lg-4 col-sm-12 col-md-4 wow fadeInLeft"
            data-wow-delay="0.6s"
            style="
              visibility: visible;
              animation-delay: 0.6s;
              animation-name: fadeInLeft;
            "
          >
            <div class="single-service">
              <div class="service-video">
                <!-- Local Video Embed -->
                <video width="100%" height="auto" controls>
                  <source src="videos\CSRF\Cross-Site Request Forgery (CSRF) Explained.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                <h5>Cross-Site Request Forgery (CSRF) Explained</h5>
              </div>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-12 col-md-4 wow fadeInLeft"
            data-wow-delay="0.9s"
            style="
              visibility: visible;
              animation-delay: 0.9s;
              animation-name: fadeInLeft;
            "
          >
             <div class="single-service">
              <div class="service-video">
                <!-- Local Video Embed -->
                <video width="100%" height="auto" controls>
                  <source src="videos\CSRF\Cross-Site Request Forgery (CSRF) Explained.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                  <h5>Cross-Site Request Forgery (CSRF)</h5>
              </div>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-12 col-md-4 wow fadeInLeft"
            data-wow-delay="1.2s"
            style="
              visibility: visible;
              animation-delay: 1.2s;
              animation-name: fadeInLeft;
            "
          >
            <div class="single-service">
              <div class="service-video">
                <!-- Local Video Embed -->
                <video width="100%" height="auto" controls>
                  <source src="videos\demo.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                  <h5> Bypass Using Brute-Force Attack</h5>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    
    <section class="team-area section-gap" id="research">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-50 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10 text-warning">REFERENCE DOCUMENTS</h1>
              <p>
                We combine our shared passion for cybersecurity with software
                development expertise to create the coolest online platform for
                demonstrating OSWASP TOP 10 vulnerabilities.
              </p>
            </div>
          </div>
        </div>
        <div class="container text-dark">
          <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">IDORE</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">Insecure Direct Object 
                    References</h5>
                  <p class="card-text">The insecure direct object reference simply represents the 
                    flaws in the system design without the full protection 
                    mechanism for the sensitive ....... </p>
                  <a href="Project_Study\idor1.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">IDOR: Implementation</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">Implementation of a Hands-on Attack and Defense</h5>
                  <p class="card-title text-dark">This thesis aims to implement a web-based hands-on attack and defense lab for insecure direct object  ........ </p>
                  <a href="Project_Study\idor2.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">IDORE Usage</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">What are Cryptographic Failures?</h5>
                  <p class="card-text">Based on this web application, the lab exercises were created including the 
                    automated scripts to evaluate learners solutions. ........ </p>
                  <a href="Project_Study\idor2.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
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
  </body>
</html>
