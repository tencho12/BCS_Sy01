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
             <iframe src="injection_insecure.php" style="width: 100%; height: 400px; border: none;"></iframe>
          </div>
          <div class="row">
            <div class="col">
                <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    PASS THE QUIZ TO SECURE YOUR FORM
                </a>
            </div>
            <div class="col">
                <a class="btn btn-warning mb-2" href="https://owasp.org/www-community/attacks/SQL_Injection" target="_blank" role="button" >
                   View OWASP Documentation
                </a>
            </div>
          </div>
        </div>
        <div class="container mt-5 collapse" id="collapseExample">
          <div class="row">
                <div class="col-5">
                  <h2 class="mb-2">SQL Injection Quiz</h2>
                    <div class="container">
                      <form id="quizForm">
                          <div class="py-2">
                              <p>1. What is SQL injection?</p>
                              <input type="radio" name="q1" value="A" required> A) A type of SQL command<br>
                              <input type="radio" name="q1" value="B"> B) A security vulnerability<br>
                              <input type="radio" name="q1" value="C"> C) A database management technique<br>
                              <input type="radio" name="q1" value="D"> D) None of the above<br>
                          </div>

                          <div class="py-2">
                              <p>2. Which of the following is a method to prevent SQL injection?</p>
                              <input type="radio" name="q2" value="A" required> A) Input sanitization<br>
                              <input type="radio" name="q2" value="B"> B) Using prepared statements<br>
                              <input type="radio" name="q2" value="C"> C) Both A and B<br>
                              <input type="radio" name="q2" value="D"> D) None of the above<br>
                          </div>

                          <div class="py-2">
                              <p>3. Why should error messages be generic in production?</p>
                              <input type="radio" name="q3" value="A" required> A) To prevent revealing sensitive information<br>
                              <input type="radio" name="q3" value="B"> B) They are not important<br>
                              <input type="radio" name="q3" value="C"> C) To confuse attackers<br>
                              <input type="radio" name="q3" value="D"> D) To make debugging easier<br>
                          </div>
                          <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="checkAnswers()">Submit</button>
                      </form>

                      <div class="my-3">
                        <h4>Result:</h4>
                        <h5 id="resultText"></h5>
                      </div>
                    </div>
                </div>
                <div class="col-7">
                  <h3 style="color: yellow">WHEN YOU PASS THE QUIZ, The secure form will be displayed here for testing</h3>
                  <div id="result" class="result hidden"> 
                    <iframe src="injection_secure.php" style="width: 100%; height: 500px; border: none;"></iframe>
                    
                  </div>
                <div>
              </div> 
              
            
            </div>
          </div>
        </div>
      </div>
    </section>


  <?php include 'footer.php'; ?>

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
