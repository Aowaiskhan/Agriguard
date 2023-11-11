<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <?php include '../header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">1.Manage Users</h2>
                        <p class="card-text">Manage and view registered users.</p>
                        <a href="list_users.php" class="btn btn-primary">Go to User Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">2.Manage Category</h2>
                        <p class="card-text">Manage insurance-Category tasks.</p>
                        <a href="list_category.php" class="btn btn-primary">Go to Category Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">3.Manage Policy</h2>
                        <p class="card-text">Manage Category-Policy tasks.</p>
                        <a href="list_policy.php" class="btn btn-primary">Go to Policy Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">4.Manage Insurance</h2>
                        <p class="card-text">Manage insurance-related tasks.</p>
                        <a href="list_insurance.php" class="btn btn-primary">Go to Insurance Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">5.Manage Distribute Insurance</h2>
                        <p class="card-text">View and handle insurance Distribute.</p>
                        <a href="list_claims.php" class="btn btn-primary">Go to Distribute Management</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">6.Manage Claims</h2>
                        <p class="card-text">View and handle insurance claims.</p>
                        <a href="list_claims.php" class="btn btn-primary">Go to Claims Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">7.Client List</h2>
                        <p class="card-text">View and handle Frames Insurance.</p>
                        <a href="list_users_insurance.php" class="btn btn-primary">Go to Frames Insurance</a>
                    </div>
                </div>
            </div>
            <!-- Add more administrative features as needed -->
        </div>
    </div>

    <?php include '../footer.html'; ?>
</body>
</html>
