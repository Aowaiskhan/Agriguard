<?php
session_start();
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php">
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
                    <a class="nav-link" href="admin_dashboard.php">Home</a>
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