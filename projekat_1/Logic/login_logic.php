<?php 
require_once "../Pages/login.php";

// Include the database connection file
require_once "db_connection.php";
 
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = $_POST["password"];

// Prepare SQL statement
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user && password_verify($password,$user['password'])){
  session_start();
    $_SESSION['user_id'] = $user['id'];
    header("Location: ../Pages/index.php");
    exit;
} else {
    echo "Incorrect email or password";
}
$stmt->close();
$conn->close();
?>

