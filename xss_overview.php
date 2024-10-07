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
  </head>

  <body id="home">
    <?php include 'header.php'; ?>

    <!-- <div class="mt-50"></div> -->
    <!-- Start service Area -->
     <div class="pt-60"></div>
    <section class="service-area section-gap" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-40 header-text">
            <h1>XSS OVERVIEW</h1>
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
              <div class="serivce-icon">
                <i class="fa fa-bug"></i>
              </div>
              <h3>Cryptographic Failures</h3>
              <p>
                Common errors such as using hardcoded passwords, outdated
                cryptographic algorithms, or weak cryptographic keys can result
                in the exposure of sensitive data (the previous name for this
                category).
              </p>
              <a href="cryptofail.php" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a></br></br>
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
              <div class="serivce-icon">
                <i class="fa fa-eye"></i>
              </div>
              <h3>Injection</h3>
              <p>
                Injection flaws, such as SQL, NoSQL, and OS command injection,
                occur when untrusted data is sent to an interpreter. This can
                result in attackers executing unauthorized commands or accessing
                data without proper permissions.
              </p>
              <a href="injection.php" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a>
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
              <div class="serivce-icon">
                <i class="fa fa-fa"></i>
              </div>
              <h3>XSS</h3>
              <p>
                Security vulnerabilities that stem from poor system design,
                leading to flaws in application logic, workflows, and data
                flows. It emphasizes the need for secure software design
                principles from the start.
              </p>
              <a href="xss.php" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a><br/><br/>
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
                <h5 class="card-header text-dark">SQL Injection</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">How SQL Injection Works:</h5>
                  <p class="card-text">SQL injection exploits improper handling of user-supplied input. Most web applications allow users to input data via forms (e.g., login fields, search boxes)....... </p>
                  <a href="blog.php?id=1" class="btn btn-sm btn-outline-info">Read All</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">Broken Authentication</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">How SQL Injection Works:</h5>
                  <p class="card-title text-dark">Broken Authentication is a common web application vulnerability where attackers exploit flaws in authentication mechanisms to ........ </p>
                  <a href="blog.php?id=2" class="btn btn-sm btn-outline-info">Read All</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card">
                <h5 class="card-header text-dark">Cryptographic Failures</h5>
                <div class="card-body">
                  <h5 class="card-title text-dark">What are Cryptographic Failures?</h5>
                  <p class="card-text">Cryptographic Failures (formerly known as "Sensitive Data Exposure" in the OWASP Top 10) occur when sensitive data, such as passwords, credit card  ........ </p>
                  <a href="blog.php?id=3" class="btn btn-sm btn-outline-info">Read All</a>
                </div>
              </div>
            </div>
          </div>
  </div>
      </div>
    </section>

    <section class="contact-page-area section-gap" id="contact">
      <div class="container">
        <div class="row">
          <!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>-->
          <div class="col-lg-4 d-flex flex-column address-wrap">
            <div class="single-contact-address d-flex flex-row">
              <div class="icon">
                <span class="lnr lnr-home"></span>
              </div>
              <div class="contact-details">
                <h5>MCT Campus</h5>
                <p>Mhow, Indore</p>
              </div>
            </div>
            <div class="single-contact-address d-flex flex-row">
              <div class="icon">
                <span class="lnr lnr-phone-handset"></span>
              </div>
              <div class="contact-details">
                <h5>+92 123 445 678</h5>
                <!-- <p>24/7 Free Customer Support Available</p> -->
              </div>
            </div>
            <div class="single-contact-address d-flex flex-row">
              <div class="icon">
                <span class="lnr lnr-envelope"></span>
              </div>
              <div class="contact-details">
                <h5>admin@waves.com</h5>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form
              id="myForm"
              action="mail.php"
              method="post"
              class="contact-form text-right form-area"
            >
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input
                    name="name"
                    placeholder="Enter your name"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'"
                    class="common-input mb-20 form-control"
                    required=""
                    type="text"
                  />

                  <input
                    name="email"
                    placeholder="Enter email address"
                    pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'"
                    class="common-input mb-20 form-control"
                    required=""
                    type="email"
                  />

                  <input
                    name="subject"
                    placeholder="Enter your subject"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your subject'"
                    class="common-input mb-20 form-control"
                    required=""
                    type="text"
                  />
                  <div class="mt-20 alert-msg" style="text-align: left"></div>
                </div>
                <div class="col-lg-6 form-group">
                  <textarea
                    class="common-textarea form-control"
                    name="message"
                    placeholder="Messege"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Messege'"
                    required=""
                  ></textarea>
                  <button
                    class="primary-btn mt-20 text-white"
                    style="float: right"
                  >
                    Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End contact-page Area -->

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
