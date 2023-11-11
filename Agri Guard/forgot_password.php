<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include 'header.html'; ?>
</head>

<body>
<?php include 'nav.php'; ?>
    <!-- Content her of body -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Forgot Password</div>
                    <div class="card-body">
                        <form action="forgot_password_process.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.html';
    ?>
</body>

</html>