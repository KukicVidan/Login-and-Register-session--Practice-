<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title> 
    <link rel="stylesheet" href="register.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="process_form.php" method="post">
      <div class="input-box">
        <input name="username" type="text" placeholder="Create username" required>
      </div>
      <div class="input-box">
        <input name="email" type="text" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input name="password" type="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input name="password2" type="password" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox" required>
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
      <div class="text">
        <h3><a href="index.php">Back to homepage</a></h3>
      </div>
    </form>
  </div>
</body>
</html>