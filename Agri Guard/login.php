<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.html'; ?>
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_GET['login_failed']) && $_GET['login_failed'] === 'true') {
                    // Display the login failed message
                    $message = isset($_GET['error']) ? urldecode($_GET['error']) : 'Login failed. Please try again.';
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                }
                ?>
                <?php
                // Start or resume the session
              

                // Check if a message exists in the session
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    // Clear the message from the session to show it only once
                    unset($_SESSION['message']);
                } else {
                    $message = ""; // No message
                }
                ?>
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="login_process.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div class="mt-3">
                            <p>
                                <a href="register.php">Register</a> | <a href="forgot_password.php">Forgot Password</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="py-5">
        </div>
        <?php include 'footer.html'; ?>
</body>

</html>