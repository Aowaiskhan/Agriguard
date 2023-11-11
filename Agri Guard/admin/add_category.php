<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Category</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>Add Category</h1>
            </div>
            <div class="col-6 text-right">
                <a href="list_category.php" class="btn btn-primary">List</a>
            </div>
        </div>


        <?php
        include '../include/db.php'; // Include your database connection file here
        
        $successMessage = ""; // Initialize the success message variable
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to add a new category
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            // Insert the new category into the database
            $insert_query = "INSERT INTO category (name, description, status) VALUES ('$name', '$description', '$status')";

            if ($conn->query($insert_query) === TRUE) {
                $successMessage = "Category added successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        ?>
        <!-- Display success or error message -->
        <?php
        if (!empty($successMessage)) {
            echo '<div class="alert alert-success" role="alert">' . $successMessage . '</div>';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<div class="alert alert-danger" role="alert">Failed to add category. Please check the form data.</div>';
        }
        ?>
        <!-- Category Add Form -->
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for "status">Status</label>
                <select class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>