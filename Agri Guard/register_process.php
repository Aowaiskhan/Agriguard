<?php
include 'include\db.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password securely
    $email = $_POST['email'];
    $name = $_POST['name'];
    $avatar = "img/default.png";
 
    // Prepare and execute an SQL statement to insert user data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, name, avatar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $email, $name, $avatar);

    if ($stmt->execute()) {
        // Registration successful
        $stmt->close(); // Close the statement
        $conn->close(); // Close the database connection
        header("Location: login.php");
        exit();
    } else {
        $stmt->close(); // Close the statement
        $conn->close(); // Close the database connection
        // Registration failed
        // You can handle errors and redirect to the registration page with an error message
        header("Location: register.php?registration_failed=true");
        exit();
    }
    
   
}
 
?>
