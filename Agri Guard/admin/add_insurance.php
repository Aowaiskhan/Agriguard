<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Insurance</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
    <div class="row">
            <div class="col-6">
                <h1>Add Insurance</h1>
            </div>
            <div class="col-6 text-right">
                <a href="list_category.php" class="btn btn-primary">List</a>
            </div>
        </div>
        <?php
        include '../include/db.php'; // Include your database connection file here

        $successMessage = ""; // Initialize the success message variable

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission to add a new insurance
            $policy_id = $_POST['policy_id'];
            $code = $_POST['code'];
            $insurance_term = $_POST['insurance_term'];
            $coverage = $_POST['coverage'];
            $premium = $_POST['premium'];
            $details = $_POST['details'];
            $terms_condition = $_POST['terms_condition'];
            $status = $_POST['status'];

            // Insert the new insurance into the database
            $insert_query = "INSERT INTO insurance_list (policy_id, code, insurance_term, coverage, premium, details, terms_condition, status) 
                            VALUES ('$policy_id', '$code', '$insurance_term', '$coverage', '$premium', '$details', '$terms_condition', '$status')";

            if ($conn->query($insert_query) === TRUE) {
                $successMessage = "Insurance added successfully!";
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
            echo '<div class="alert alert-danger" role="alert">Failed to add insurance. Please check the form data.</div>';
        }
        ?>
        <!-- Insurance Add Form -->
        <form method="POST">
            <div class="form-group">
                <label for="policy_id">Policy</label>
                <select class="form-control" name="policy_id" required>
                    <?php
                    $policy_query = "SELECT id, name FROM policy_list";
                    $policy_result = $conn->query($policy_query);

                    while ($policy = $policy_result->fetch_assoc()) {
                        echo '<option value="' . $policy['id'] . '">' . $policy['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" required>
            </div>
            <div class="form-group">
                <label for="insurance_term">Insurance Term</label>
                <input type="text" class="form-control" name="insurance_term" required>
            </div>
            <div class="form-group">
                <label for="coverage">Coverage</label>
                <input type="text" class="form-control" name="coverage" required>
            </div>
            <div class="form-group">
                <label for="premium">Premium</label>
                <input type="text" class="form-control" name="premium" required>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" name="details" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="terms_condition">Terms & Conditions</label>
                <textarea class="form-control" name="terms_condition" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Insurance</button>
        </form>
    </div>

    <p class="py-5"></p>
    <?php include '../footer.html'; ?>
</body>

</html>
