<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance Details</title>
    <?php include 'header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Insurance Details</h1>
            </div>
        </div>

        <?php
        include 'include/db.php'; // Include your database connection file here

        // Get the insurance_id from the URL parameter
        $insurance_id = $_GET['insurance_id'];

        // Retrieve insurance details
        $insurance_query = "SELECT i.id, i.policy_id, i.code, i.insurance_term, i.coverage, i.premium, i.details, i.terms_condition, i.status, i.created_at, p.name AS policy_name
                            FROM insurance_list AS i
                            JOIN policy_list AS p ON i.policy_id = p.id
                            WHERE i.id = $insurance_id";

        $insurance_result = $conn->query($insurance_query);

        if ($insurance_result->num_rows > 0) {
            $row = $insurance_result->fetch_assoc();
            echo '<form method="POST" action="process_buy.php">';
            echo '<input type="hidden" name="insurance_id" value="' . $insurance_id . '">';
            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo '<h3>' . $row['insurance_term'] . '</h3>';
            echo '<h6>' . $row['code'] . '</h6>';
            echo '<p>' . $row['details'] . '</p>';
            echo '<p>Coverage: ' . $row['coverage'] . '</p>';
            echo '<p>Premium: ' . $row['premium'] . '</p>';            
          
           
            echo '<p>Terms & Conditions:<a href="#" class="btn btn-primary">' . $row['terms_condition'] . '</a></p>';

            echo '<button type="submit">Buy Insurance</button>';
            echo '</form>';
            echo '</div>';

            // Display an image (you can customize the image path)
            echo '<div class="col-md-6">';
            echo '<img src="img/logo.png" alt="Insurance Image" class="img-fluid">';
            echo '</div>';

            echo '</div>';
        } else {
            echo '<p>Insurance record not found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <p class="py-5"></p>
    <?php include 'footer.html'; ?>
</body>

</html>
