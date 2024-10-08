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

    <!-- Paradise Slider -->
    <div
      id="fw_al_008"
      class="carousel slide ps_slide_y ps_indicators_bx ps_control_l_y swipe_y ps_easeOutQuint"
      data-ride="carousel"
      data-pause="hover"
      data-interval="6500"
      data-duration="2500"
    >

      <!-- Wrapper For Slides -->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="img/bg1.jpg" alt="fw_al_001_01" />
          <div class="fw_al_008_slide">
            <h6 data-animation="animated fadeInUp">Be Aware, Be Secure</h6>
            <h2 data-animation="animated fadeInUp">We Care About</h2>
            <h3 data-animation="animated fadeInUp">Your Protection</h3>
            <p data-animation="animated fadeInUp">
              WAVES - Web Application Vulnerability & Exploit Simulator is an
              Web Vulnerability Simulator tool that will help you make your Web
              Applications safe and secure.
            </p>
            <a
              href="http://127.0.0.1:8000"
              data-animation="animated fadeInUp"
              class="sliderbtn1"
              target="_blank"
              ><span style="font-weight: bolder"> Get Started</span></a
            >
            <a
              href="#price"
              data-animation="animated fadeInUp"
              class="sliderbtn2"
              ><span style="font-weight: bolder">More Detail</span></a
            >
          </div>
        </div>
      </div>
    
    </div>
  

    <!-- Start service Area -->
    <section class="service-area section-gap" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-40 header-text">
            <h1>OWASP TOP 10 vulnerabilities</h1>
            <p>Explore the OWASP top 10 vulnerabilities</p>
          </div>
        </div>
        <div class="row">
          <div
            class="col-lg-3 col-sm-12 col-md-3 wow fadeInLeft"
            data-wow-delay="0.3s"
            style="
              visibility: visible;
              animation-delay: 0.3s;
              animation-name: fadeInLeft;
            "
          >
            <div class="single-service">
              <div class="serivce-icon">
                <i class="fa fa-shield"></i>
              </div>
              <h3>Broken Access Control</h3>
              <p>
                Access control vulnerabilities occur when users can act outside
                of their intended permissions. This can lead to unauthorized
                actions such as viewing or modifying data, and escalating
                privileges.
              </p>
              <a href="#" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a>
            </div>
          </div>
          <div
            class="col-lg-3 col-sm-12 col-md-3 wow fadeInLeft"
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
              <a href="#" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a>
            </div>
          </div>
          <div
            class="col-lg-3 col-sm-12 col-md-3 wow fadeInLeft"
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
            class="col-lg-3 col-sm-12 col-md-3 wow fadeInLeft"
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
              <h3>Insecure Design</h3>
              <p>
                Security vulnerabilities that stem from poor system design,
                leading to flaws in application logic, workflows, and data
                flows. It emphasizes the need for secure software design
                principles from the start.
              </p>
              <a href="#" class="btn" title="Read More"
                >Read more <i class="fa fa-angle-double-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End service Area -->

    <!-- Start Call to Action Area -->
    <!--
			<section class="call_to_action section-gap" id="call_to_action">
				<div class="container">
					<div class="row">-->
    <!--Content Column-->
    <!--
		            	<div class="content-column col-md-9 col-sm-12">
		                	<div class="inner-box">
		                    	<div class="icon-box">
		                        	<div class="fa fa-globe"></div>
		                        </div>
		                    	<div class="content">
		                        	<h3>GET FREE CONSULTATION  (OR)  CALL US: +1-234-678-8900</h3>
		                            <div class="text marbot">The Love Boat promises something for everyone now to beat every of just one the others comfortable.</div>
		                        </div>
		                    </div>
		                </div>
		                
		                <div class="btn-column text-right col-md-3 col-sm-12">
		                	<a href="#" class="theme-btn btn-style-one">GET INQUIRY</a>
		                </div>
		                
		            </div>
				</div>
			</section>-->

    <!-- End Call to Action Area -->

    <!-- Start Our Team Area -->
    <section class="team-area section-gap" id="team">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10">WAVES Team</h1>
              <p>
                We combine our shared passion for cybersecurity with software
                development expertise to create the coolest online platform for
                penetration testing and security assessments.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="img/ali1.png" alt="Guard-img" />
                <ul class="social">
                  <li><a href="#" class="fa fa-envelope"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Name</h3>
                <span class="post">Role</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="img/shahwar1.png" alt="Guard-img" />
                <ul class="social">
                  <li><a href="#" class="fa fa-envelope"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Shahwar Afridi</h3>
                <span class="post">Security Auditor</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="our-team">
              <div class="pic">
                <img src="img/aqib1.png" alt="Guard-img" />
                <ul class="social">
                  <li><a href="#" class="fa fa-envelope"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
              <div class="team-content">
                <h3 class="title">Aqib Mehmood</h3>
                <span class="post">Security Analyst</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- End Our Team Area -->

    <!-- Start contact-page Area -->
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
