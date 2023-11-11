<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Policy</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
    <div class="row">
            <div class="col-6">
                <h1>List Policy</h1>
            </div>
            <div class="col-6 text-right">
                <a href="list_policy.php" class="btn btn-primary">List</a>
            </div>
    </div>
        <?php
        include '../include/db.php'; // Include your database connection file here

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to add a new policy
            $category_id = $_POST['category_id'];
            $code = $_POST['code'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $cost = $_POST['cost'];
            $doc_path = $_POST['doc_path'];
            $status = $_POST['status'];

            // Insert the new policy into the database
            $insert_query = "INSERT INTO policy_list (category_id, code, name, description, duration, cost, doc_path, status) 
                            VALUES ('$category_id', '$code', '$name', '$description', '$duration', '$cost', '$doc_path', '$status')";

            if ($conn->query($insert_query) === TRUE) {
                $successMessage = "Policy added successfully!";
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
            echo '<div class="alert alert-danger" role="alert">Failed to add policy. Please check the form data.</div>';
        }
        ?>
        <!-- Policy Add Form -->
        <form method="POST">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                    <?php
                    $category_query = "SELECT id, name FROM category";
                    $category_result = $conn->query($category_query);

                    while ($category = $category_result->fetch_assoc()) {
                        echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" name="duration" required>
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="text" class="form-control" name="cost" required>
            </div>
            <div class="form-group">
                <label for="doc_path">Document Path</label>
                <input type="text" class="form-control" name="doc_path">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Policy</button>
        </form>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
