<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Policies</title>
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
                <h1>List Policies</h1>
            </div>
            <div class="col-6 text-right">
                <a href="add_policy.php" class="btn btn-primary">ADD</a>
            </div>
        </div>
        <!-- Policy table with DataTables -->
        <table class="table table-striped" id="policyTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Cost</th>
                    <th>Doc Path</th>
                    <th>Status</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection and fetch policies with associated category names
                include '../include/db.php';
                $query = "SELECT policy_list.*, category.name AS category_name FROM policy_list
                          LEFT JOIN category ON policy_list.category_id = category.id";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['code'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['category_name'] . '</td>';
                        echo '<td>' . $row['duration'] . '</td>';
                        echo '<td>' . $row['cost'] . '</td>';
                        echo '<td>' . $row['doc_path'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                      
                       
                        echo '<td>';
                        echo '<a href="edit_policy.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>';
                        // echo '<a href="delete_policy.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "No policies found.";
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
        // Activate DataTables for policyTable
        $(document).ready(function () {
            $('#policyTable').DataTable();
        });
    </script>
</body>

</html>
