<?php 
// Start the session to track user login
// session_start();

?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  // Check if the user is logged in (based on session)
  var isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'true' : 'false'; ?>;
  
  // Select all "QUIZ" links
  var quizLinks = document.querySelectorAll('a[href*="quiz.php"]');

  // If the user is not logged in, disable the links
  if (!isLoggedIn) {
    quizLinks.forEach(function(link) {
      link.classList.add("disabled");
      link.setAttribute("href", "#"); // Disable the link
      link.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default action (navigation)
      });
    });
  }
});
</script>
<style>
  a.disabled {
  pointer-events: none;
  color: red !important;
  cursor: not-allowed;

}

</style>
<header id="header">
  <div class="container header-top">
  </div>

  <div class="container">
    <div class="row align-items-center justify-content-between d-flex">
      <div id="logo">
        <a href="index.php">WAVES®</a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
           <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">XSS</a>
            <ul class="dropdown-menu">
              <li><a href="xss_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=xss">QUIZ</a></li>
              <li><a href="1xss.php">DEMO</a></li>
               <li><a href="Project_Study/XSS_Attack_Scripts.pdf" download>XSS HELP DOC</a></li>
            </ul>
          </li>

           <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">BRUTE FORCE</a>
            <ul class="dropdown-menu">
              <li><a href="bruteforce_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=bruteforce">QUIZ</a></li>
              <li><a href="broke\index.html">DEMO</a></li>
            </ul>
          </li>

           <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">CSRF</a>
            <ul class="dropdown-menu">
              <li><a href="csrf_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=csrf">QUIZ</a></li>
              <li><a href="csrf/index.html">DEMO</a></li>
            </ul>
          </li>

           <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">IDOR</a>
            <ul class="dropdown-menu">
              <li><a href="idor_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=idor">QUIZ</a></li>
              <li><a href="idor\index.php">DEMO</a></li>
            </ul>
          </li>

           <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">SQL INJECTION</a>
            <ul class="dropdown-menu">
              <li><a href="injection_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=sql_injection">QUIZ</a></li>
              <li><a href="injection.php">DEMO</a></li>
              <li><a href="attack\index.php">AUTO SIMULATOR</a></li>
            </ul>
          </li>

          <li class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">CRYPTOGRAPHIC FAILURE</a>
            <ul class="dropdown-menu">
              <li><a href="cryptofail_overview.php">OVERVIEW</a></li>
              <li><a href="quiz.php?quiz=cryptographic_fail">QUIZ</a></li>
              <li><a href="cryptofail.php">DEMO</a></li>
            </ul>
          </li>

          <li><a href="Project_Study\Syn1 (WAVES) Proj Report.pdf" download>USER GUIDE</a></li>
          <li><a href="auth.php">Account</a></li>
        </ul>
      </nav>
    </div>
  </div>
    <hr/>
</header>
