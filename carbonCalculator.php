<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Calculator</title>
<h1>Carbon Footprint Calculator</h1>

<style>
  /* CSS styling for form */
  h1,h2{
    text-align: center;
  }
  form {
    max-width: 500px;
    margin: 0 auto;
    padding: 18px;
    background: #f4f7f6;
    border-radius: 8px;
  }
  input[type="number"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<?php
// Start the session
session_start();
require("connection.php");

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // Get the username from the session
    $username = $_SESSION['username'];
} else {
    // If user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!-- Display the welcome message with the retrieved username -->
<h3>Welcome, <?php echo $username; ?>!</h3>

<form id="carbonFootprintForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="transportation">Transportation (in miles):</label>
  <input type="number" id="transportation" name="transportation" placeholder="Enter miles">
  
  <label for="energy">Energy Consumption (in kWh):</label>
  <input type="number" id="energy" name="energy" placeholder="Enter kWh">
  
  <label for="diet">Diet (in kg of CO2):</label>
  <input type="number" id="diet" name="diet" placeholder="Enter kg of CO2">
  
  <button type="submit" id="calculateButton">Calculate</button>
</form>

<div id="result">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transportation = isset($_POST['transportation']) ? floatval($_POST['transportation']) : 0;
    $energy = isset($_POST['energy']) ? floatval($_POST['energy']) : 0;
    $diet = isset($_POST['diet']) ? floatval($_POST['diet']) : 0;
    $totalCarbonFootprint = $transportation + $energy + $diet;
    
    // Retrieve username from session
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Insert data into carboncalculator
    $servername = "localhost:3307";
    $db_username = "root";
    $db_password = "";
    $db_name = "bit210";
    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO carboncalculator (username, transportation, energy, diet, total_carbon_footprint) VALUES ('$username', '$transportation', '$energy', '$diet', '$totalCarbonFootprint')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New record inserted successfully!");</script>';
        echo '<script>window.setTimeout(function() { window.location = "carbonCalculator.php"; }, 1000);</script>'; // Redirect after 1 second
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</div>

<div id="dashboard">
    <h2>Real-time Carbon Footprint Dashboard</h2>
    <div id="totalCarbonFootprint"></div>
    <div id="emissionBreakdown"></div>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Function to update the dashboard with real-time carbon footprint data
function updateDashboard() {
    // Retrieve user inputs
    var transportation = parseFloat(document.getElementById("transportation").value);
    var energy = parseFloat(document.getElementById("energy").value);
    var diet = parseFloat(document.getElementById("diet").value);
    
    // Check if any of the input fields are empty
    if (isNaN(transportation) || isNaN(energy) || isNaN(diet)) {
        // Display an error message and return without calculating
        document.getElementById("totalCarbonFootprint").innerHTML = "<p>Please enter valid data for all fields.</p>";
        document.getElementById("emissionBreakdown").innerHTML = ""; // Clear previous breakdown
        return;
    }
    
    // Perform calculation
    var totalCarbonFootprint = transportation + energy + diet;

    // Store the calculated data in localStorage
    localStorage.setItem("totalCarbonFootprint", totalCarbonFootprint);
    localStorage.setItem("transportation", transportation);
    localStorage.setItem("energy", energy);
    localStorage.setItem("diet", diet);

    // Update total carbon footprint
    document.getElementById("totalCarbonFootprint").innerHTML = "<p>Total Carbon Footprint: " + totalCarbonFootprint + " kg CO2</p>";
    
    // Update emission breakdown
    var breakdownHTML = "<h3>Emission Breakdown:</h3>";
    breakdownHTML += "<ul>";
    breakdownHTML += "<li>Transportation: " + transportation + " kg CO2</li>";
    breakdownHTML += "<li>Energy Consumption: " + energy + " kg CO2</li>";
    breakdownHTML += "<li>Diet: " + diet + " kg CO2</li>";
    breakdownHTML += "</ul>";
    document.getElementById("emissionBreakdown").innerHTML = breakdownHTML;
  
    // Data visualization
    var ctx = document.createElement('canvas');
    document.getElementById("emissionBreakdown").innerHTML = "";
    document.getElementById("emissionBreakdown").appendChild(ctx);

    var emissionData = [transportation, energy, diet];
    var emissionLabels = ['Transportation', 'Energy Consumption', 'Diet'];
    var colors = ['#FF6384', '#36A2EB', '#FFCE56'];

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: emissionLabels,
            datasets: [{
                data: emissionData,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

// Function to load the dashboard data from localStorage
function loadDashboard() {
    var totalCarbonFootprint = localStorage.getItem("totalCarbonFootprint");
    var transportation = localStorage.getItem("transportation");
    var energy = localStorage.getItem("energy");
    var diet = localStorage.getItem("diet");

    // If data exists in localStorage, update the dashboard
    if (totalCarbonFootprint && transportation && energy && diet) {
        document.getElementById("transportation").value = transportation;
        document.getElementById("energy").value = energy;
        document.getElementById("diet").value = diet;
        updateDashboard();
    }
}

// Add event listener to the "Calculate" button
document.getElementById("calculateButton").addEventListener("click", updateDashboard);

// Load dashboard data on page load
window.addEventListener("load", loadDashboard);
  
</script>
  
</body>
</html>