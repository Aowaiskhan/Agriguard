
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.html'; ?>
<title>Weather Info</title>
</head>
<body>
<?php include 'nav.php'; ?>
    <!-- Content her of body -->
    <main class="py-5">
      <div class="container">
        
    <h1>Current Weather</h1>
    <div id="weather-info">
        <p>Location: <span id="location"></span></p>
        <p>Temperature: <span id="temperature"></span>&deg;C</p>
        <p>Condition: <span id="condition"></span></p>
    </div>

    <script>
        const apiKey = 'YOUR_API_KEY'; // Replace with your API key
        const city = 'New York'; // Replace with the city or location you want to get weather data for
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;

        fetch(apiUrl)
            .then((response) => response.json())
            .then((data) => {
                const location = data.name;
                const temperature = data.main.temp;
                const condition = data.weather[0].description;

                document.getElementById('location').textContent = location;
                document.getElementById('temperature').textContent = temperature;
                document.getElementById('condition').textContent = condition;
            })
            .catch((error) => {
                console.error('Error fetching weather data:', error);
            });
    </script>
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