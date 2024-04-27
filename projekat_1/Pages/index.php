<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reg and log</title>
  <link rel="stylesheet" href="../Styles/style.css">
</head>
<body>
    <nav class="nav">
      <div class="left-content">
        <a class="logo" href="index.php">Home</a>
      </div>
      <div class="right-content">
      <?php
        if (isset($_SESSION['user_id'])) {
          // If user is logged in, display logout button
          echo '<a class="Register" href="../Logic/logout.php">Log out</a>';
        } else {
          // If user is not logged in, display login and register buttons
          echo '<a class="Login" href="login.php">Log in</a>';
          echo '<a class="Register" href="register.php">Register</a>';
        }
        ?>
      </div>
    </nav>
</body>
</html>
