<?php
session_start();
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Logo" class="mr-2" style="border-radius: 10px;">
            AgriGuard
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="latest_insurance.php">Insurance</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="helpline.php">Helpline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php
                // Check if the "user" session variable is set
                if (isset($_SESSION['user'])) {
                    if ($_SESSION['usertype'] == 'Admin') {
                        // Display links for admin
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="admin_dashboard.php">Admin Dashboard</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="../logout.php">Logout</a>';
                        echo '</li>';
                    } elseif ($_SESSION['usertype'] == 'User') {
                        // Display links for user
                        echo '<a class="nav-link" href="dashboard.php">User Dashboard</a>';
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo '<i class="fa fa-user" style="font-size: 24px;"></i>';
                        echo '</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="profileDropdown">';
                        echo '<a class="dropdown-item" href="my_insurance.php">My Insurance</a>';
                        echo '<a class="dropdown-item" href="my_claim.php">Claim Insurance</a>';
                        echo '<a class="dropdown-item" href="profile.php">My Profile</a>';
                        echo '<div class="dropdown-divider"></div>';
                        echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                        echo '</div>';
                        echo '</li>';
                    }
                } else {
                    // Show the "Login" link for users who are not logged in
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="login.php">Login</a>';
                    echo '</li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>