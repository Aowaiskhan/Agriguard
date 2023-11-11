<!DOCTYPE html>
<html lang="en">

<head>
    <title>Claim Insurance</title>
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
        <!-- User table with DataTables -->
        <table class="table table-striped" id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize an empty array to store user data
                $users = array();

                include '../include/db.php';

                // Replace 'users' with the actual table name in your database
                $sql = "SELECT * FROM users";

                // Execute the SQL query
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch user data and store it in the $users array
                    while ($row = mysqli_fetch_assoc($result)) {
                        $users[] = $row;
                    }

                    // Close the database connection
                    $conn->close();
                }

                foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>' . $user['id'] . '</td>';
                    echo '<td>' . $user['username'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['name'] . '</td>';
                    echo '<td>' . $user['avatar'] . '</td>';
                    echo '<td>' . $user['usertype'] . '</td>';
                    echo '<td>' . $user['status'] . '</td>';
                    echo '<td>';
                    // echo '<a href="edit_user.php?id=' . $user['id'] . '" class="btn btn-primary">Edit</a>';
                    echo '<a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-danger">Delete</a>';
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
        // Activate DataTables for userTable
        $(document).ready(function () {
            $('#userTable').DataTable();
        });
    </script>
</body>

</html>