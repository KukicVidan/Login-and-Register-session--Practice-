
<?php 
require_once "../Pages/register.php";


 $conn = new mysqli("localhost", "root", "", "registration_form");

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = $_POST["password"];
$password2 = $_POST["password2"];

// Check if passwords match
if ($password !== $password2) {
  die("Confirmed password is incorrect");
}

//Check if username is taken

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0){
  die("Username is taken");
}

//Check if email is taken

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
  die("Email is taken");
}

// Hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$username,$email,$passwordHash);

if($stmt->execute()){
  // Get the user_id of the inserted user
  $user_id = $stmt->insert_id;

  session_start();
  $_SESSION['user_id'] = $user_id;
  header("Location: ../Pages/index.php");
  exit;
} else {
  echo "Error " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

