<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Policy</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Edit Policy</h1>
            </div>
        </div>
        <?php
       
        include '../include/db.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to update the policy
            $id = $_POST['id'];
            $category_id = $_POST['category_id'];
            $code = $_POST['code'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $cost = $_POST['cost'];
            $doc_path = $_POST['doc_path'];
            $status = $_POST['status'];
            $delete_flag = $_POST['delete_flag'];

            // Update the policy in the database
            $update_query = "UPDATE policy_list SET category_id='$category_id', code='$code', name='$name',
                            description='$description', duration='$duration', cost='$cost',
                            doc_path='$doc_path', status='$status', delete_flag='$delete_flag'
                            WHERE id=$id";

            if ($conn->query($update_query) === TRUE) {
                $successMessage = "Policy updated successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        }

        // Fetch policy data for editing
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $select_query = "SELECT * FROM policy_list WHERE id=$id";
            $result = mysqli_query($conn, $select_query);

            if ($result) {
                $policy = mysqli_fetch_assoc($result);
            } else {
                echo "Error fetching policy data: " . $conn->error;
            }
        }

        // Fetch category data for the dropdown
        $category_query = "SELECT id, name FROM category";
        $category_result = $conn->query($category_query);
        ?>
        <!-- Policy Edit Form -->
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $policy['id']; ?>">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                    <?php
                    while ($category = $category_result->fetch_assoc()) {
                        $selected = ($category['id'] == $policy['category_id']) ? 'selected' : '';
                        echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" value="<?php echo $policy['code']; ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $policy['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="4"><?php echo $policy['description']; ?></textarea>
            </div>
            <!-- Include other policy fields here -->
            <!-- ... -->
            <button type="submit" class="btn btn-primary">Update Policy</button>
        </form>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
