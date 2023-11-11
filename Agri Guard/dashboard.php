<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Welcome to Your Dashboard</h1>
                <p class="lead">Protecting Farmers During Disasters</p>
            </div>
        </div>

        <!-- Cards with Information -->
        <div class="row mt-4">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="img/logo.webp" class="card-img-top" alt="Farmers Image">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">We are dedicated to safeguarding farmers' interests and providing insurance solutions during disasters.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="img/logo.png" class="card-img-top" alt="Insurance Image">
                    <div class="card-body">
                        <h5 class="card-title">Insurance Options</h5>
                        <p class="card-text">Explore our insurance policies tailored to protect farmers and their livelihoods.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="img/technical-support.png" class="card-img-top" alt="Support Image">
                    <div class="card-body">
                        <h5 class="card-title">Customer Support</h5>
                        <p class="card-text">Our team is here to assist you. Contact us for any inquiries or assistance you may need.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Button -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="latest_insurance.php" class="btn btn-primary btn-lg">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.html'; ?>
</body>

</html>
