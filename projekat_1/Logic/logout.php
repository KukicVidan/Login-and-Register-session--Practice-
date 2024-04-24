<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to index.php after logout
header("Location: ../Pages/index.php");
exit;
?>