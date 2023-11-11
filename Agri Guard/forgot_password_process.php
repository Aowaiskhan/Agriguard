<?php
 include 'include\db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    // Replace this with your own database query to retrieve user information
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Generate a unique reset token (you need to implement this)
        $reset_token = generate_unique_token();

        // Store the reset token and timestamp in the database
        // Replace this with your own database update statement
        $update_query = "UPDATE users SET reset_token = ?, reset_token_expires = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_query);
        $expiration_time = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour
        $update_stmt->bind_param("sss", $reset_token, $expiration_time, $email);
        $update_stmt->execute();

        // Send a password reset email with the reset token (you need to implement this)
        send_password_reset_email($email, $reset_token);

        // Redirect the user to a confirmation page
        header("Location: reset_password_confirmation.php");
        exit();
    } else {
        // Email not found in the database, you may want to display an error message
        header("Location: forgot_password.php?email_not_found=true");
        exit();
    }
} else {
    // If the form is not submitted, redirect to the forgot password page
    header("Location: forgot_password.php");
    exit();
}

// Function to generate a unique reset token
function generate_unique_token($length = 32) {
    // Generate a random string of the specified length
    $token = bin2hex(random_bytes($length / 2)); // Generates a random hexadecimal string

    return $token;
}

// Function to send a password reset email
function send_password_reset_email($email, $reset_token) {
    // Set the recipient email address
    $to = $email;

    // Set the subject of the email
    $subject = "Password Reset";

    // Set the message body of the email
    $message = "Dear user,\n\n";
    $message .= "You have requested to reset your password.\n";
    $message .= "To reset your password, click the following link:\n";
    $message .= "http://localhost:44/insurance/farmer_insurance/reset_password.php?token=" . $reset_token . "\n\n";
    $message .= "If you did not request this, please ignore this email.\n";
    $message .= "Best regards,\nYour Website Team";

    // Additional headers
    $headers = "From: webmaster@example.com\r\n";
    $headers .= "Reply-To: webmaster@example.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    mail($to, $subject, $message, $headers);
}

