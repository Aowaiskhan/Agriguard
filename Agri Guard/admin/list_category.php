<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Categories</title>
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
                <h1>List Categories</h1>
            </div>
            <div class="col-6 text-right">
                <a href="add_category.php" class="btn btn-primary">ADD</a>
            </div>
        </div>
        <!-- Category table with DataTables -->
        <table class="table table-striped" id="categoryTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize an empty array to store category data
                $categories = array();

                include '../include/db.php';

                // Replace 'category' with the actual table name in your database
                $sql = "SELECT * FROM category";

                // Execute the SQL query
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch category data and store it in the $categories array
                    while ($row = mysqli_fetch_assoc($result)) {
                        $categories[] = $row;
                    }

                    // Close the database connection
                    $conn->close();
                }
                
                foreach ($categories as $category) {
                    echo '<tr>';
                    echo '<td>' . $category['id'] . '</td>';
                    echo '<td>' . $category['name'] . '</td>';
                    echo '<td>' . $category['description'] . '</td>';
                    echo '<td>' . $category['status'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit_category.php?id=' . $category['id'] . '" class="btn btn-primary">Edit</a>';
                    // echo '<a href="delete_category.php?id=' . $category['id'] . '" class="btn btn-danger">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
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
        // Activate DataTables for categoryTable
        $(document).ready(function () {
            $('#categoryTable').DataTable();
        });
    </script>
</body>

</html>
