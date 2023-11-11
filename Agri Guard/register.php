<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <?php include 'header.html';  ?>
</head>

<body>
<?php include 'nav.php'; ?>
    <!-- Content her of body -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php
                if (isset($_GET['registration_failed']) && $_GET['registration_failed'] === 'true') {
                    // Display the login failed message
                    $message = isset($_GET['message']) ? urldecode($_GET['message']) : 'Registration failed. Please try again.';
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                }
                ?>
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="register_process.php" method="POST">
                        <div class="form-group">
                                <label for="username">Nike Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nike Name" required>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="py-5"></main>

    <?php
    include 'footer.html';
    ?>
</body>

</html>