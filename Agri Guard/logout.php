<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Unset all of the session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page or any other appropriate page
header("Location: login.php");
exit();
?>
