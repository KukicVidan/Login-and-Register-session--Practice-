<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title> 
    <link rel="stylesheet" href="../Styles/register.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="../Logic/login_logic.php" method="post">
     
      <div class="input-box">
        <input name="email" type="text" placeholder="Enter your email" required>
      </div>
      
      <div class="input-box">
        <input name="password" type="password" placeholder="Enter password" required>
      </div>
     
      <div class="input-box button">
        <input type="Submit" value="Login">
      </div>
      <div class="text">
        <h3>Dont have account? <a href="../Pages/register.php">register now</a></h3>
      </div>
      <div class="text">
        <h3><a href="../Pages/index.php">Back to homepage</a></h3>
      </div>
    </form>
  </div>
</body>
</html>