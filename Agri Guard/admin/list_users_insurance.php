<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Users Insurance</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>List Users Insurance</h1>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Insurance ID</th>
                    <th>Status</th>
                    <!-- <th>Premium Amount</th>
                    <th>Coverage</th>
                    <th>Claim Amount</th>
                    <th>Claim Percentage</th> -->
                    <th>Given By</th>
                    <th>Created At</th>
                    <th>Approved Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../include/db.php'; // Include your database connection file here

                // Replace 'users_insurance' with your actual table name
                $sql = "SELECT * FROM users_insurance";

                // Execute the SQL query
                $result = $conn->query($sql);
                if (!$result) {
                    die("Error: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['user_id'] . '</td>';
                        echo '<td>' . $row['insurance_id'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        // echo '<td>' . $row['premium_amount'] . '</td>';
                        // echo '<td>' . $row['coverage'] . '</td>';
                        // echo '<td>' . $row['claim_amount'] . '</td>';
                        // echo '<td>' . $row['claim_percentage'] . '</td>';
                        echo '<td>' . $row['given_by'] . '</td>';
                        echo '<td>' . $row['created_at'] . '</td>';
                        echo '<td>' . $row['approved_date'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="11">No records found.</td></tr>';
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
