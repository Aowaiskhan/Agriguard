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
                            WHERE ui.user_id = $user_id";

        $insurance_result = $conn->query($insurance_query);
        if (!$insurance_result) {
            die("Error: " . $conn->error);
        }
        if ($insurance_result->num_rows > 0) {
            echo '<table class="table" id="insuranceTable">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Insurance Term</th>';
            echo '<th>Code</th>';
            echo '<th>Details</th>';
            echo '<th>Coverage</th>';
            echo '<th>Premium</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $insurance_result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['insurance_term'] . '</td>';
                echo '<td>' . $row['code'] . '</td>';
                echo '<td>' . $row['details'] . '</td>';
                echo '<td>' . $row['coverage'] . '</td>';
                echo '<td>' . $row['premium'] . '</td>';
                // echo '<td>' . $row['status'] . '</td>';
                echo '<td><a href="claim.php?id=' . $row['id'] . '" class="btn btn-primary">Claim</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No insurance records found for this user.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <p class="py-5"></p>
    <?php include 'footer.html'; ?>
    
    <script>
        $(document).ready(function() {
            $('#insuranceTable').DataTable(); // Initialize the DataTable plugin for table search and pagination
        });
    </script>
</body>

</html>
