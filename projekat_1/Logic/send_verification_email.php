<?php
// Include the database connection file
require_once "db_connection.php";

// Extract email and verification code from the URL parameters
$email = $_GET['email'];
$verificationCode = $_GET['code'];

// Your email verification logic goes here
// This could include building the email message, setting the subject, etc.
$to = $email;
$subject = "Email Verification";
$message = "Hello,\n\n";
$message .= "Thank you for registering. Please click the link below to verify your email:\n";
$message .= "http://localhost/projekat_1/Logic/verify_email.php?email=$email&code=$verificationCode\n\n";
$message .= "If you did not register on our website, please ignore this email.\n\n";
$message .= "Regards,\nThe Project Team";

// Send email
if (mail($to, $subject, $message)) {
    // Update the user's record in the database to mark them as verified
    $stmt = $conn->prepare("UPDATE users SET is_verified = TRUE WHERE email = ? AND verification_code = ?");
    $stmt->bind_param("ss", $email, $verificationCode);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "Verification email sent. Please check your email inbox.";
    } else {
        echo "Failed to verify email. Please try again.";
    }

    $stmt->close();
} else {
    echo "Failed to send verification email. Please try again later.";
}

$conn->close();
?>

