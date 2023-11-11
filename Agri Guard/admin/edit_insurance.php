<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Insurance</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Edit Insurance</h1>
            </div>
        </div>
        <?php
        include '../include/db.php'; // Include your database connection file here

        $successMessage = ""; // Initialize the success message variable
        $insurance = array(); // Initialize the $insurance array

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to update the insurance record
            $insurance_id = $_POST['insurance_id'];
            $policy_id = $_POST['policy_id'];
            $code = $_POST['code'];
            $insurance_term = $_POST['insurance_term'];
            $coverage = $_POST['coverage'];
            $premium = $_POST['premium'];
            $details = $_POST['details'];
            $terms_condition = $_POST['terms_condition'];
            $status = $_POST['status'];

            // Update the insurance record in the database
            $update_query = "UPDATE insurance_list
                            SET policy_id = '$policy_id', 
                                code = '$code', 
                                insurance_term = '$insurance_term', 
                                coverage = '$coverage', 
                                premium = '$premium', 
                                details = '$details', 
                                terms_condition = '$terms_condition', 
                                status = '$status'
                            WHERE id = '$insurance_id'";

            if ($conn->query($update_query) === TRUE) {
                $successMessage = "Insurance updated successfully!";
                $insurance_id = $_GET['id'];
            $select_query = "SELECT * FROM insurance_list WHERE id = '$insurance_id'";
            $result = $conn->query($select_query);

                if ($result->num_rows === 1) {
                    $insurance = $result->fetch_assoc();
                }
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            // Retrieve the insurance record for editing
            $insurance_id = $_GET['id'];
            $select_query = "SELECT * FROM insurance_list WHERE id = '$insurance_id'";
            $result = $conn->query($select_query);

            if ($result->num_rows === 1) {
                $insurance = $result->fetch_assoc();
            } else {
                echo "Insurance record not found.";
                exit;
            }
        }
        ?>
        <!-- Display success or error message -->
        <?php
        if (!empty($successMessage)) {
            echo '<div class="alert alert-success" role="alert">' . $successMessage . '</div>';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<div class="alert alert-danger" role="alert">Failed to update insurance. Please check the form data.</div>';
        }
        ?>
        <!-- Insurance Edit Form -->
        <form method="POST">
            <input type="hidden" name="insurance_id" value="<?php echo $insurance['id']; ?>">
            <div class="form-group">
                <label for="policy_id">Policy</label>
                <select class="form-control" name="policy_id" required>
                    <?php
                    $policy_query = "SELECT id, name FROM policy_list";
                    $policy_result = $conn->query($policy_query);

                    while ($policy = $policy_result->fetch_assoc()) {
                        $selected = ($policy['id'] == $insurance['policy_id']) ? 'selected' : '';
                        echo '<option value="' . $policy['id'] . '" ' . $selected . '>' . $policy['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" value="<?php echo $insurance['code']; ?>" required>
            </div>
            <div class="form-group">
                <label for="insurance_term">Insurance Term</label>
                <input type="text" class="form-control" name="insurance_term" value="<?php echo $insurance['insurance_term']; ?>" required>
            </div>
            <div class="form-group">
                <label for="coverage">Coverage</label>
                <input type="text" class="form-control" name="coverage" value="<?php echo $insurance['coverage']; ?>" required>
            </div>
            <div class="form-group">
                <label for="premium">Premium</label>
                <input type="text" class="form-control" name="premium" value="<?php echo $insurance['premium']; ?>" required>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" name="details" rows="4"><?php echo $insurance['details']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="terms_condition">Terms & Conditions</label>
                <textarea class="form-control" name="terms_condition" rows="4"><?php echo $insurance['terms_condition']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="1" <?php echo ($insurance['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo ($insurance['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Insurance</button>
        </form>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
