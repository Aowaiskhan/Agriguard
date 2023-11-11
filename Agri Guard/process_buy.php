<?php
session_start(); // Start the session

// Check if the user is logged in (replace 'user_id' with your actual session variable)
if (isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id =$_SESSION['user_id'];

    // Check if the form is submitted and the 'id' is provided
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insurance_id'])) {
        $id = $_POST['insurance_id'];

        // Fetch insurance details based on the provided 'id'
        include 'include/db.php'; // Include your database connection file here

        $selectInsuranceQuery = "SELECT * FROM insurance_list WHERE id = $id";
        $result = $conn->query($selectInsuranceQuery);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Extract details from the fetched data
            $insurance_id = $row['id'];
            $primum_amount = $row['premium'];
            $coverage = $row['coverage'];
            $given_by = $_SESSION['user_id'];

            // Now, you can save these details to another table (e.g., 'user_insurances')
            // Make sure to replace 'user_insurances' with your actual table name
            $insertUserInsuranceQuery = "INSERT INTO users_insurance (user_id, insurance_id, primum_amount, coverage, given_by) 
                                         VALUES ('$user_id', '$insurance_id', '$primum_amount', '$coverage', '$given_by')";

            if ($conn->query($insertUserInsuranceQuery) === TRUE) {
                // Successfully saved insurance details to the 'user_insurances' table
                echo "Insurance details saved successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Insurance record not found.";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Invalid request.";
    }
} else {
 
// Set the message in a session variable
$_SESSION['message'] = "User is not logged in. Please log in to access this feature.";

// Redirect to the login page
header("Location: login.php");
exit; // Make sure to exit after the redirect
}
?>
