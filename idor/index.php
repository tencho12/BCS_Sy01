<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IDOR Demo</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        header, footer { background-color: #2e2e2e; color: white; text-align: center; padding: 10px 0; }
        h3 { color: #333; text-align: center; }
        ul { list-style-type: none; padding: 0; }
        ul li { margin: 15px; text-align: center; }
        a { background-color: #3f51b5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        a:hover { background-color: #303f9f; }
        footer { position: fixed; width: 100%; bottom: 0; }

        .tencho {
            padding-left: 70px;
            padding-right: 70px;
            line-height: 1.5

        }
        .tencho2 {
            color: red;
            font-size: 20px;
        }
         .tencho3 {
            color: green;
            font-size: 20px;
        }
        .tenchobtn{
            background-color: red;
        }
        .tenchohome{
            background-color: #23a151;
            margin-top: 15px
        } 
        .tenchospace{
          padding: 5px
        }
        .tenchospace2{
          padding: 30px
        }
    </style>
</head>
<body>

<header>
    <h1>IDOR Demo</h1>
</header>
<br>
<ul>
<br/>
    <li><a href="login.php?redirect_to=idor_vulnerable.php" class="tenchobtn">Vulnerable Page (IDOR)</a></li>
    <div class="tenchospace"></div>
    <li><a href="../index.php" class="tenchohome">Return Home</a></li>
    <br/>
    <li>
        <pre class="tencho2">$user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id']; // Insecure: This allows ID manipulation</pre>
        <p class="tencho">
            This line is where the IDOR vulnerability is introduced. The code checks if an id is provided in the URL (via $_GET['id']). If found, it uses that id to fetch the user's information from the database. If not, it defaults to using the current logged-in user's user_id stored in the session.

            Why this is insecure: A user can modify the id in the URL to any arbitrary value. For example, visiting a URL like idor_vulnerable.php?id=2 will show the data of the user with id = 2, even if the logged-in user's user_id is different. This is an IDOR vulnerability, as users can directly access or modify resources they should not have permission to.
        </p>
    </li><br/>
     
    <li><a href="login.php?redirect_to=idor_secure.php">Secure Page (IDOR Mitigation)</a></li><br>
    <li>
        <pre class="tencho3">
            $user_id = $_SESSION['user_id']; // Safe: User ID comes from session, not URL manipulation
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
        </pre>
    </li>
    <span class="mb-40"></span>
        <br/>
</ul>

<div class="tenchospace2"></div>

<footer>
    <p>Copyright to WAVES 2024</p>
</footer>

</body>
</html>
