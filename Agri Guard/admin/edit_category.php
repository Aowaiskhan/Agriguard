<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Category</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <?php
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission to update the category
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Replace 'category' with the actual table name in your database
    $update_query = "UPDATE category SET name='$name', description='$description', status='$status' WHERE id=$id";

    if ($conn->query($update_query) === TRUE) {
        $successMessage = "Category updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch the category data for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM category WHERE id=$id";
    $result = mysqli_query($conn, $select_query);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching category data: " . $conn->error;
    }
}
?>
<!-- Category Edit Form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Edit Category</h1>
        </div>
    </div>
    <?php
    if (isset($successMessage)) {
        echo '<div class="alert alert-success" role="alert">' . $successMessage . '</div>';
    }
    ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $category['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="4"><?php echo $category['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1" <?php if ($category['status'] == 1) echo 'selected'; ?>>Active</option>
                <option value="0" <?php if ($category['status'] == 0) echo 'selected'; ?>>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>


    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
