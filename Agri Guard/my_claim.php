<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Insurance</title>
    <?php include 'header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>My Insurance</h1>
            </div>
        </div>

        <?php
        include 'include/db.php'; // Include your database connection file here
        
        // Replace this with the actual user ID (you can use session or another method to get the user's ID)
        $user_id = $_SESSION['user_id'];

        // Retrieve user's insurance details
        $insurance_query = "SELECT i.id, i.policy_id, i.code, i.insurance_term, i.coverage, i.premium, i.details, i.terms_condition, i.status, i.created_at
                            FROM users_insurance AS ui
                            JOIN insurance_list AS i ON ui.insurance_id = i.id
                            WHERE ui.user_id = $user_id and ui.status='Claim' ";

        $insurance_result = $conn->query($insurance_query);
        if (!$insurance_result) {
            die("Error: " . $conn->error);
        }
        if ($insurance_result->num_rows > 0) {
            while ($row = $insurance_result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo '<h3>' . $row['insurance_term'] . '</h3>';
                echo '<h6>' . $row['code'] . '</h6>';
                echo '<p>' . $row['details'] . '</p>';
                echo '<p>Coverage: ' . $row['coverage'] . '</p>';
                echo '<p>Premium: ' . $row['premium'] . '</p>';
                echo '<p>Status: ' . $row['status'] . '</p>';
                echo '<p>Terms & Conditions:</p>';
                echo '<p>' . $row['terms_condition'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No insurance records found for this user.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <p class="py-5"></p>
    <?php include 'footer.html'; ?>
</body>

</html>
