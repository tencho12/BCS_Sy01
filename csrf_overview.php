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
          <section class="service-area section-gap pb-20" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 header-text">
            <h1>CROSS-SITE REQUEST FORGERY (CSRF)</h1>
          </div>
        </div>
        <div>
          <p style="line-height: 1.7; font-size: 15px">
            Cross-Site Request Forgery (CSRF) is a web security vulnerability that enables an attacker to trick a victim's browser into making unwanted requests to a web application where the user is authenticated, without their consent. This can lead to unauthorized actions being performed on behalf of the victim, such as changing account settings, making purchases, or transferring funds. CSRF attacks exploit the trust that a web application has in the user's browser, leveraging the user’s existing session. There are primarily two types of CSRF: state-changing requests, which alter the state of the application (e.g., modifying account details), and non-state-changing requests, such as fetching data or triggering actions that do not change server state. To defend against CSRF, web developers can implement anti-CSRF tokens, which are unique tokens sent with requests that validate the authenticity of the request, and employ the Same Site attribute in cookies to restrict cross-origin requests.
          </p>
        </div>
        
      </div>
    </section>
    <section class="service-area" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-20 header-text">
            <h1>WATCH CSRF VIDEOS</h1>
            <p>Cross-Site Request Forgery</p>
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
                  <source src="videos\IDOR\IDOR Attack _ Demo.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                <h5>IDOR Attack</h5>
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
                  <source src="videos\IDOR\Insecure Direct Object Reference (IDOR) Explained.mp4" type="video/mp4">
                  <source src="videos\demo.mp4" type="video/webm">
                  <!-- Fallback message if video format is not supported -->
                  Your browser does not support the video tag.
                </video>
                  <h5>Insecure Direct Object Reference (IDOR) Explained</h5>
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
                  <h5>Insecure Direct Object Reference (IDOR) Explained</h5>
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
                <h5 class="card-header text-dark">CSRF Attacks</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">CSRF Attacks Acunetix:</h5>
                  <p class="card-text">also known as CSRF, Sea Surf, or XSRF, is an attack whereby
                  an attacker tricks a victim into performing actions on their behalf. The impact of the attack....... </p>
                  <a href="Project_Study\CSRF Attacks_ Acunetix.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">CSRF: Exploitation and Prevention</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">Cross-Site Request Forgeries: Exploitation and Prevention:</h5>
                  <p class="card-title text-dark">Cross-Site Request Forgery (CSRF) attacks occur when a
                    malicious web site causes a user’s web browser to  ........ </p>
                  <a href="Project_Study\csrf2.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">Cross-Site Request Forgery</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">Cross-Site Request Forgery: Attack and Defense</h5>
                  <p class="card-text">Cross Site Request Forgery (CSRF) has emerged as a 
                      potent threat to Web 2.0 applications. Because of the 
                      stateless  ........ </p>
                  <a href="Project_Study\csrf.pdf" class="btn btn-sm btn-outline-info" download>Download</a>
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
