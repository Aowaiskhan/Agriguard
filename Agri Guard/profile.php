<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <?php include 'header.html'; ?>
</head>

<body>
    <?php include 'nav.php'; ?>
    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the user ID from the form
        $id = $_POST['id'];

        // Handle the profile update
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Check if a new profile image is uploaded
        if (!empty($_FILES['avatar']['name'])) {
            $uploadDir = 'profile/';
            $avatarName = $_FILES['avatar']['name'];
            $avatarPath = $uploadDir . $avatarName;

            // Move the uploaded image to the 'img' directory
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath)) {
                // Update the user's avatar in the database
                $updateAvatarSQL = "UPDATE users SET avatar = '$avatarPath' WHERE id = $id";
                include 'include/db.php';

                if ($conn->query($updateAvatarSQL) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Profile updated successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating profile: ' . $conn->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Error uploading profile image.</div>';
            }
        }

        // Update the user's name and email
        $updateProfileSQL = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        include 'include/db.php';

        if ($conn->query($updateProfileSQL) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Profile updated successfully!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating profile: ' . $conn->error . '</div>';
        }

        // Close the database connection
        $conn->close();
    }
    ?>
    <div class="container mt-5">
        <h1>My Profile</h1>
        <?php
        $user = array();
        if (isset($_SESSION['id'])) {
            // Get the user ID from the session
            $id = $_SESSION['id'];

            // Construct the SQL query to fetch user information by ID
            $sql = "SELECT * FROM users WHERE id = $id";

            include 'include/db.php';

            // Execute the SQL query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // Fetch user data and store it in the $user array
                while ($row = mysqli_fetch_assoc($result)) {
                    $user[] = $row;
                }

                // Close the database connection
                $conn->close();
            }
        }
        ?>
        <div class="row">
            <div class="col-md-4">
                <!-- User information -->
                <div class="card">
                    <img src="<?php echo $user[0]['avatar'] ?? 'img/default.png'; ?>" alt="User Avatar"
                        class="card-img-top">
                    

                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $user[0]['name'] ?? ''; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $user[0]['email'] ?? ''; ?>
                        </p>
                        <p class="card-text">User Type:
                            <?php echo $user[0]['usertype'] ?? ''; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Profile update form -->
                <div class="card">
                    <div class="card-header">
                        Update Profile
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo $user[0]['id'] ?? ''; ?>" />
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $user[0]['name'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $user[0]['email'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Profile Image</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="py-4"></p>
    <?php include 'footer.html'; ?>
</body>

</html>