<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Insurance</title>
    <?php include '../header.html'; ?>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>List Insurance</h1>
            </div>
            <div class="col-6 text-right">
                <a href="add_insurance.php" class="btn btn-primary">ADD</a>
            </div>
        </div>
        <!-- Insurance table with DataTables -->
        <table class="table table-striped" id="insuranceTable">
            <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Policy ID</th>
                    <th>Code</th>
                    <th>Insurance Term</th>
                    <th>Coverage</th>
                    <th>Premium</th>
                    <th>details</th>
                    <th>terms_condition</th>
                   
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection and fetch insurance data
                include '../include/db.php';

                $query = "SELECT * FROM insurance_list";
                $result = $conn->query($query);
                if (!$result) {
                    die("Error in SQL query: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';                       
                        echo '<td>' . $row['policy_id'] . '</td>';
                        echo '<td>' . $row['code'] . '</td>';
                        echo '<td>' . $row['insurance_term'] . '</td>';
                        echo '<td>' . $row['coverage'] . '</td>';
                        echo '<td>' . $row['premium'] . '</td>';
                        echo '<td>' . $row['details'] . '</td>';
                        echo '<td>' . $row['terms_condition'] . '</td>';                     
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td>';
                        echo '<a href="edit_insurance.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>';
                        // echo '<a href="delete_insurance.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "No insurance records found.";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Activate DataTables for insuranceTable
        $(document).ready(function () {
            $('#insuranceTable').DataTable();
        });
    </script>
</body>

</html>
