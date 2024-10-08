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
    <link rel="stylesheet" href="../css/linearicons.css" />
    <link rel="stylesheet" href="../css/tencho.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <link rel="stylesheet" href="../css/magnific-popup.css" />
    <link rel="stylesheet" href="../css/nice-select.css" />
    <link rel="stylesheet" href="../css/animate.min.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css" />
    <link rel="stylesheet" href="../css/full_width_animated_layers_008.css" />
    <link rel="stylesheet" href="../css/main.css" />
  </head>

  <body id="home">
    <?php include '../header.php'; ?>

    <!-- <div class="mt-50"></div> -->
    <!-- Start service Area -->
     <div class="pt-60"></div>
    <section class="service-area section-gap" id="vulnerabilities">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 pb-20 header-text">
            <h1>BRUTE FORCE ATTACT SIMULATION</h1>
            <p>BRUTE FORCE ATTACT SIMULATION</p>
          </div>
        </div>
        <div class="container mt-5">
      <h1 class="text-center">Brute Force Attack Demo</h1>

      <div id="bruteForceDemo" class="card mt-4">
        <div class="card-body">
          <h2 class="card-title text-dark">Vulnerable Login Form</h2>
          <p class="card-text text-dark">
            This form is vulnerable to brute force attacks. Try logging in with
            different usernames and passwords.
          </p>

          <form id="loginForm" action="process.php" method="post">
            <input type="hidden" name="vulnerability" value="brute_force" />
            <div class="form-group">
              <input
                type="text"
                name="username"
                class="form-control"
                placeholder="Username"
                required
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
                required
              />
            </div>
            <div id="captchaContainer" class="form-group text-dark"></div>
            <div class="form-group">
              <input
                type="text"
                name="captchaInput"
                class="form-control"
                placeholder="Enter CAPTCHA"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <div id="loginResult" class="mt-3 text-dark"></div>
          <pre id="loginCode" class="bg-light p-3 mt-3"></pre>
        </div>
      </div>

      <button onclick="openVulnerablePage()" class="btn btn-secondary mt-4">
        Open Vulnerable Page
      </button>
    </div>
        
      </div>
    </section>
    

  <?php include '../footer.php'; ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/jquery.touchSwipe.min.js"></script>
    <script src="../js/paradise_slider_min.js"></script>
    <script src="../js/main.js"></script>
        <script>
      document
        .getElementById("loginForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          const form = e.target;
          const formData = new FormData(form);

          fetch(form.action, {
            method: form.method,
            body: formData,
          })
            .then((response) => {
              if (!response.ok) {
                throw new Error("Network response was not ok");
              }
              return response.json();
            })
            .then((data) => {
              document.getElementById("loginResult").textContent = data.message;
              document.getElementById("loginCode").textContent = data.code;

              if (data.message.includes("Brute force attack detected!")) {
                alert("Brute force attack detected!");
              } else if (data.message.includes("Login successful!")) {
                alert("Login successful!");
              } else if (data.message.includes("Invalid")) {
                alert("Invalid username or password!");
              } else if (data.message.includes("CAPTCHA")) {
                alert("CAPTCHA verification failed!");
              }

              // Refresh CAPTCHA after every submission
              refreshCaptcha();
            })
            .catch((error) => {
              console.error("Error:", error);
              document.getElementById("loginResult").textContent =
                "An error occurred.";
            });
        });

      // CAPTCHA generation and refresh function
      function generateRandomCaptcha() {
        const characters =
          "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let captcha = "";
        for (let i = 0; i < 6; i++) {
          captcha += characters.charAt(
            Math.floor(Math.random() * characters.length)
          );
        }
        return captcha;
      }

      function refreshCaptcha() {
        const captchaContainer = document.getElementById("captchaContainer");
        const captchaText = generateRandomCaptcha();
        captchaContainer.innerHTML = `<p>CAPTCHA: <b>${captchaText}</b></p>
                                    <input type="hidden" name="captcha" value="${captchaText}">`;
      }

      // Initial CAPTCHA display
      refreshCaptcha();

      // Open vulnerable page in a new tab
      function openVulnerablePage() {
        window.open("vulnerable.php", "_blank");
      }
    </script>
  </body>
</html>
