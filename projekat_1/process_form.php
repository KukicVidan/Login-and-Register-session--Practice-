
<?php 
require_once "register.php";


 $conn = new mysqli("localhost", "root", "", "registration_form");

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = $_POST["password"];
$password2 = $_POST["password2"];

//Checking if username is taken
$username_check = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
$username_rows = mysqli_num_rows($username_check);
if($username_rows > 0){
  die ("Username is taken");
}
//Checking if email is taken
$email_check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
$email_rows = mysqli_num_rows($email_check);
if($email_rows > 0){
  die ("Email is taken");
}
//Checking passords and if they are same encripting it before sending

if($password !== $password2){
  echo "Confirmed password is incorect";
}
else {
$password = password_hash($password, PASSWORD_DEFAULT);
mysqli_query($conn,"INSERT INTO users(username,email,password)
VALUES ('$username','$email','$password')");
}

$conn->close();


?>