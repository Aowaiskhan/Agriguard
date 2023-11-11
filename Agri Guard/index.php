
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.html'; ?>
</head>
<body>
<?php include 'nav.php'; ?>
    <!-- Content her of body -->

    <!-- Header -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1>Protecting Farmers During Disasters</h1>
            <!-- <a href="#" class="btn btn-orange btn-lg">Get Started</a> -->
        </div>
    </header> 
    <!-- Main Content -->
    <main class="py-5">
      <div class="container">
        <div class="row">
    
          <!-- Weather Data Card -->
          <div class="col-md-3 mb-4">
            <div class="card card-weather d-flex align-items-center justify-content-center">
              <img src="img/cloudy.png" class="card-img-top" alt="Weather Image" style="height: 50px; width: 50px;">
              <div class="card-body text-center">
                <h5 class="card-title">Weather Data</h5>
                <p class="card-text">Real-time weather updates for farmers.</p>
                <a href="weather.php" class="btn btn-primary btn-friendly">View Data</a>
              </div>
              <div class="card-footer bg-transparent border-0 text-center">
                <h6 class="card-bottom-heading">Weather Updates</h6>
              </div>
            </div>
          </div>
    
          <!-- Insurance Calculator Card -->
          <div class="col-md-3 mb-4">
            <div class="card card-calculator d-flex align-items-center justify-content-center">
              <img src="img/insurance-calc.png" class="card-img-top" alt="Calculator Image" style="height: 50px; width: 50px;">
              <div class="card-body text-center">
                <h5 class="card-title">Insurance Calculator</h5>
                <p class="card-text">Calculate your insurance premium.</p>
                <a href="insurance_calc.php" class="btn btn-primary btn-friendly">Calculate</a>
              </div>
              <div class="card-footer bg-transparent border-0 text-center">
                <h6 class="card-bottom-heading">Premium Calculator</h6>
              </div>
            </div>
          </div>
    
          <!-- Application Status Card -->
          <div class="col-md-3 mb-4">
            <div class="card card-status d-flex align-items-center justify-content-center">
              <img src="img/payment.png" class="card-img-top" alt="Status Image" style="height: 50px; width: 50px;">
              <div class="card-body text-center">
                <h5 class="card-title">Application Status</h5>
                <p class="card-text">Check the status of your application.</p>
                <a href="#" class="btn btn-primary btn-friendly">Check Status</a>
              </div>
              <div class="card-footer bg-transparent border-0 text-center">
                <h6 class="card-bottom-heading">Application Tracker</h6>
              </div>
            </div>
          </div>
    
          <!-- Technical Help Card -->
          <div class="col-md-3 mb-4">
            <div class="card card-help d-flex align-items-center justify-content-center">
              <img src="img/technical-support.png" class="card-img-top" alt="Help Image" style="height: 50px; width: 50px;">
              <div class="card-body text-center">
                <h5 class="card-title">Technical Help</h5>
                <p class="card-text">Get technical support and assistance.</p>
                <a href="#" class="btn btn-primary btn-friendly">Get Help</a>
              </div>
              <div class="card-footer bg-transparent border-0 text-center">
                <h6 class="card-bottom-heading">Support Center</h6>
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </main> 
    <main class="py-5">
        <div class="container">
            <p>AgriGuard is dedicated to providing insurance solutions that help farmers mitigate the risks of disasters and safeguard their livelihoods.</p>
            <!-- Add more content here -->
        </div>
    </main>
 <!-- Main Content -->
 

<?php include 'footer.html'; ?>
</body>
</html> 