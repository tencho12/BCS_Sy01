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

  <body id="home">
    <?php include 'header.php'; ?>

    <!-- <div class="mt-50"></div> -->
    <!-- Start service Area -->
    <div class="pt-60"></div>
    <section class="service-area section-gap" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 header-text">
            <h1>CROSS SITE SCRIPTING (XSS) ATTACK</h1>
          </div>
        </div>
        <div>
          <p style="line-height: 1.7; font-size: 15px">
            Cross-Site Scripting (XSS) is a web application vulnerability that allows attackers to inject malicious scripts, typically JavaScript, into web pages viewed by others. When users interact with a page compromised by XSS, the injected script can execute within their browser, gaining access to sensitive data such as cookies, session tokens, or other user information. There are three main types of XSS attacks: Stored XSS, where the malicious code is stored on the server (e.g., in a database) and delivered to users through normal page requests; Reflected XSS, where the attack script is embedded in a URL or form input and reflected by the server into the user's browser; and DOM-based XSS, which manipulates the client-side code directly without server interaction. XSS attacks exploit weak input validation and inadequate output encoding, making input sanitization, output encoding, and Content Security Policy (CSP) implementation crucial for defense against XSS.
          </p>
        </div>
        
      </div>
    </section>
    <section class="service-area" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-20 header-text">
            <h1>WATCH XSS VIDEOS</h1>
            <p>Cross-Site Scripting</p>
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
                  <source src="videos\xss\Injection __ Cross-Site Scripting __ Reflected XSS __ OWASP TOP 10__ LAB 1.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                <h5>Injection Cross-Site Scripting Reflected XSS</h5>
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
                  <source src="videos\xss\Injection __ Cross-Site Scripting __ Reflected XSS __ OWASP TOP 10__ LAB 1.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                  <h5>Reflected XSS OWASP TOP 10 LAB 1</h5>
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
                  <h5>What is XSS?</h5>
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
                For a list of documents for further reading, explore the links below...
              </p>
            </div>
          </div>
        </div>
        <div class="container text-dark">
          <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">XSS Research</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">State of research on cross-site scripting:</h5>
                  <p class="card-text">Cross-site scripting (XSS) is a security vulnerability that affects web applications. It occurs due
                  to improper or lack of  ....... </p>
                  <a href="Project_Study\xss\state of research on cross-site scripting.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">DOM based XSS</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">DOM Based Cross Site Scripting</h5>
                  <p class="card-title text-dark">It’s that vulnerability wherein one sends 
                  malicious data (typically HTML stuff with Javascript code in it) that is echoed back later by the 
                  application in an HTML  ........ </p>
                  <a href="Project_Study\xss\DOM Based Cross Site Scripting or XSS of the Third Kind.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">XSS attacks and defense mechanisms</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">Cross-Site Scripting (XSS) attacks and defense mechanisms</h5>
                  <p class="card-text">Nowadays, web applications are becoming one
                    of the standard platforms for representing data and service........ </p>
                  <a href="Project_Study\xss\Cross-Site Scripting (XSS) attacks and defense mechanisms.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
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
