<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance Application Tracker</title>
</head>

<body>
    <h1>Insurance Application Tracker</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the entered insurance ID from the form
        $insurance_id = $_POST['insurance_id'];

       // Implement code to fetch insurance status from your database
        // Replace this with your database query to retrieve insurance status
        $status = 'procesing';// getInsuranceStatus($insurance_id);

        if ($status !== null) {
            echo "<p>Insurance Status for ID $insurance_id: $status</p>";
        } else {
            echo "<p>Insurance ID $insurance_id not found. Please check the ID and try again.</p>";
        }
    }
    ?>

    <a href="insurance_tracking_form.html">Go Back</a>
</body>

</html>
