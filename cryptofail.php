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
         <div>
             <iframe src="crypto_insecure.php" style="width: 100%; height: 600px; border: none;"></iframe>
          </div>
          <div class="row">
            <div class="col">
                <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    PASS THE QUIZ TO SECURE YOUR FORM
                </a>
            </div>
            <div class="col">
                <a class="btn btn-info mb-2" href="https://owasp.org/Top10/A02_2021-Cryptographic_Failures/" target="_blank" role="button" >
                   View OWASP Documentation
                </a>
            </div>
          </div>
        </div>
        <div class="container mt-5 collapse" id="collapseExample">
          <div class="row">
                <div class="col-5">
                  <h2 class="mb-2">Cryptographic Failures Quiz</h2>
                   <div class="container">
                      <div id="quizContainer" class="quiz-container">
                        <div class="py-2 quiz-question" id="question1" class="question">
                            <p>1. Why are cryptographic algorithms like MD5 and SHA-1 considered insecure today?</p>
                            <input type="radio" name="q1" value="A" required> A) They use too much computational power<br>
                            <input type="radio" name="q1" value="B"> B) They are susceptible to collision attacks<br>
                            <input type="radio" name="q1" value="C"> C) They are too slow for modern systems<br>
                            <input type="radio" name="q1" value="D"> D) They do not support long enough keys<br>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="checkAnswer('q1', 'B')">Submit</button>
                        </div>

                          <div class="py-2 quiz-question" id="question2" class="question" style="display:none;">
                              <p>2. Why is the use of hardcoded cryptographic keys in software a security vulnerability?</p>
                              <input type="radio" name="q2" value="A" required> A) It slows down the encryption process<br>
                              <input type="radio" name="q2" value="B"> B) It makes the software easier to update<br>
                              <input type="radio" name="q2" value="C"> C) Hardcoded keys can be extracted through reverse engineering<br>
                              <input type="radio" name="q2" value="D"> D) It improves the security of the software<br>
                              <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="checkAnswer('q2', 'C')">Submit</button>
                          </div>

                            <div class="py-2 quiz-question" id="question3" class="question" style="display:none;">
                                <p>3. What is the consequence of poor key management in cryptographic systems?</p>
                                <input type="radio" name="q3" value="A" required> A) Decreased system performance<br>
                                <input type="radio" name="q3" value="B"> B) Reduced encryption speed<br>
                                <input type="radio" name="q3" value="C"> C) Attackers gaining access to encrypted data<br>
                                <input type="radio" name="q3" value="D")> D) Shorter key lengths<br>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="checkAnswer('q3', 'C')">Submit</button>
                            </div>

                            <div id="resultText" style="display:none;">
                                <h4>Result:</h4>
                                <h5 id="feedbackText"></h5>
                                <button type="button" class="btn btn-outline-primary mt-3" onclick="restartQuiz()">Start Again</button>
                            </div>
                 
                  <div id="resultText" style="display:none;">
                    <h4>Result:</h4>
                    <h5 id="feedbackText"></h5>
                    <button type="button" class="btn btn-outline-primary mt-3" onclick="restartQuiz()">Start Again</button>
                  </div>
                           
                  </div>
                </div>
              </div>
                <div class="col-7">
                  <h3 id="quizheader" style="color: yellow">WHEN YOU PASS THE QUIZ, The secure form will be displayed here for testing</h3>
                  <div id="result" class="result hidden"> 
                    <iframe src="crypto_secure.php" style="width: 100%; height: 600px; border: none;"></iframe>
                  </div>
                <div>
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
    <script src="js/tencho_cryptofail.js"></script>

  </body>
</html>
