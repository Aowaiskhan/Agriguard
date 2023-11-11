<?php
session_start();
include 'include/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_username_email = $_POST['username'];
    $submitted_password = $_POST['password'];
    // Replace with your own authentication logic
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $submitted_username_email, $submitted_username_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            // Verify the password
            if ($submitted_password== $user['password']) {
                // Authentication successful, create a session
                $_SESSION['id'] = $user['id'];
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user'] = $user['username'];
                $_SESSION['usertype'] = $user['usertype'];

                // Redirect based on user type
                if ($user['usertype'] === 'User') {
                    header("Location: dashboard.php");
                } elseif ($user['usertype'] === 'Admin') {
                    header("Location: admin/admin_dashboard.php");
                } else {
                    // Handle unknown user type
                    header("Location: login.php?login_failed=true&error=Unknown user type");
                }
                exit();
            } else {
                // Password verification failed
                header("Location: login.php?login_failed=true&error=Incorrect password");
                exit();
            }
        } else {
            // User not found
            header("Location: login.php?login_failed=true&error=User not found");
            exit();
        }
    } else {
        // SQL statement preparation failed
        header("Location: login.php?login_failed=true&error=Database error");
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
