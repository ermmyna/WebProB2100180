<?php

$con = mysqli_connect("localhost:3307", "root", "", "bit210");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $carKilometers = floatval($_POST["car_kilometers"]) ?? 0;
    $carpoolInstances = floatval($_POST["carpool_instances"]) ?? 0;
    $publicTransportationTimes = floatval($_POST["public_transportation_times"]) ?? 0;
    $activeCommuterDays = floatval($_POST["active_commuter_days"]) ?? 0;
    $bicycleTimes = floatval($_POST["bicycle_times"]) ?? 0;
    $electricScooterDays = floatval($_POST["electric_scooter_days"]) ?? 0;

    $redMeatServings = floatval($_POST["red_meat_servings"]) ?? 0;
    $poultryServings = floatval($_POST["poultry_servings"]) ?? 0;
    $fishServings = floatval($_POST["fish_servings"]) ?? 0;
    $plantBasedMeals = floatval($_POST["plant_based_meals"]) ?? 0;
    $plantProteinServings = floatval($_POST["plant_protein_servings"]) ?? 0;
    $mixedDietMeals = floatval($_POST["mixed_diet_meals"]) ?? 0;

    $heatingHours = floatval($_POST["heating_hours"]) ?? 0;
    $acHours = floatval($_POST["ac_hours"]) ?? 0;
    $laundryLoads = floatval($_POST["laundry_loads"]) ?? 0;
    $dryerHours = floatval( $_POST["dryer_hours"]) ?? 0;
    $dishwasherLoads = floatval($_POST["dishwasher_loads"]) ?? 0;
    $electronicHours = floatval($_POST["electronic_hours"]) ?? 0;
    $errors = array();
   
    //External data to store
    $userID = $_SESSION['userID'] ;
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = new DateTime('now');

    // Calculate carbon footprint for each category
    $carbonFootprintTransport = calculateTransportCarbonFootprint($carKilometers, $carpoolInstances, $publicTransportationTimes, $activeCommuterDays,$bicycleTimes, $electricScooterDays);
    $carbonFootprintFood = calculateFoodCarbonFootprint($redMeatServings, $poultryServings, $fishServings, $plantBasedMeals, $plantProteinServings, $mixedDietMeals);
    $carbonFootprintEnergy = calculateEnergyCarbonFootprint($heatingHours, $acHours, $laundryLoads, $dryerHours, $dishwasherLoads, $electronicHours);

    // Calculate the total carbon footprint
    $totalCarbonFootprint = $carbonFootprintTransport + $carbonFootprintFood + $carbonFootprintEnergy;

    // Store the calculated carbon footprint data in the session
    $_SESSION["carbonFootprintData"] = [
        "total" => $totalCarbonFootprint,
        "transport" => $carbonFootprintTransport,
        "food" => $carbonFootprintFood,
        "energy" => $carbonFootprintEnergy
    ];


    // Get the current week number
    $today = new DateTime('now');
    $firstDayOfMonth = new DateTime('first day of this month');

    $daysDiff = $today->diff($firstDayOfMonth)->days;

    $weekNumber = ceil(($daysDiff + 1) / 7);

    // Get the month name
    $month = $date->format('F');  
    $_SESSION['month']= $month;


    $insertQuery = "INSERT INTO weeklylog (userID, date, weekNo, month, carbonFootprintTransport, carbonFootprintFood, carbonFootprintEnergy, totalCarbonFootprint)
                    VALUES ('$userID', '" . $date->format('Y-m-d H:i:s') . "','$weekNumber','$month','$carbonFootprintTransport','$carbonFootprintFood', '$carbonFootprintEnergy', '$totalCarbonFootprint')";

    // Execute the query
    $result = mysqli_query($con, $insertQuery);

        if ($result) {
            header("Location: activity_log.php?success=updated");
            exit(); 
        } else {
            header("Location: activity_log.php?alert=storing");
            exit(); 
        }
        
 }
 
 
    function calculateTransportCarbonFootprint($carKilometers, $carpoolInstances, $publicTransportationTimes, $activeCommuterDays, $bicycleTimes,$electricScooterDays) {
        // Assume some emission factors 
        $carEmissionFactor = 2.0; // kgCO2e per kilometer for a typical car
        $carpoolEmissionFactor = 1.5; // kgCO2e per kilometer for carpooling
        $publicTransportEmissionFactor = 0.5; // kgCO2e per trip for public transportation
        $activeCommuterEmissionFactor = 0.1; // kgCO2e per day for active commuting (walking or cycling)
        $electricScooterEmissionFactor = 0.2;
        $bicycleTimesEmissionFactor = 0.1;
    
        // Calculate carbon footprint for each mode of transportation
        $carCarbonFootprint = $carKilometers * $carEmissionFactor;
        $carpoolCarbonFootprint = $carpoolInstances * $carpoolEmissionFactor;
        $publicTransportCarbonFootprint = $publicTransportationTimes * $publicTransportEmissionFactor;
        $activeCommuterCarbonFootprint = $activeCommuterDays * $activeCommuterEmissionFactor;
        $electricScooterCarbonFootprint = $electricScooterDays * $electricScooterEmissionFactor;
        $bicycleTimesCarbonFootprint = $bicycleTimes * $bicycleTimesEmissionFactor;
    
        // Sum up the carbon footprints for all transportation activities
        $totalTransportCarbonFootprint = $carCarbonFootprint + $carpoolCarbonFootprint + $publicTransportCarbonFootprint + 
                                         $activeCommuterCarbonFootprint + $electricScooterCarbonFootprint + $bicycleTimesCarbonFootprint;
    
        return $totalTransportCarbonFootprint;
    }

    function calculateFoodCarbonFootprint($redMeatServings, $poultryServings, $fishServings, $plantBasedMeals, $plantProteinServings, $mixedDietMeals) {
        // Assume some emission factors 
        $redMeatEmissionFactor = 5.0; // kgCO2e per serving of red meat
        $poultryEmissionFactor = 3.0; // kgCO2e per serving of poultry
        $fishEmissionFactor = 2.0; // kgCO2e per serving of fish
        $plantBasedMealEmissionFactor = 1.0; // kgCO2e per plant-based meal
        $plantProteinEmissionFactor = 0.5; // kgCO2e per serving of plant-based protein
        $mixedDietEmissionFactor = 2.0; // kgCO2e per dairy 
    
        // Calculate carbon footprint for each food category
        $redMeatCarbonFootprint = $redMeatServings * $redMeatEmissionFactor;
        $poultryCarbonFootprint = $poultryServings * $poultryEmissionFactor;
        $fishCarbonFootprint = $fishServings * $fishEmissionFactor;
        $plantBasedMealCarbonFootprint = $plantBasedMeals * $plantBasedMealEmissionFactor;
        $plantProteinCarbonFootprint = $plantProteinServings * $plantProteinEmissionFactor;
        $mixedDietCarbonFootprint = $mixedDietMeals * $mixedDietEmissionFactor;
    
        // Sum up the carbon footprints for all food activities
        $totalFoodCarbonFootprint = $redMeatCarbonFootprint + $poultryCarbonFootprint + $fishCarbonFootprint +
                                    $plantBasedMealCarbonFootprint + $plantProteinCarbonFootprint + $mixedDietCarbonFootprint;
    
        return $totalFoodCarbonFootprint;
    }

    function calculateEnergyCarbonFootprint($heatingHours, $acHours, $laundryLoads, $dryerHours, $dishwasherLoads,$electronicHours) {
        // Assume some emission factors
        $heatingEmissionFactor = 0.2; // kgCO2e per hour of heating
        $acEmissionFactor = 0.3; // kgCO2e per hour of air conditioning
        $laundryEmissionFactor = 1.0; // kgCO2e per load of laundry
        $dryerEmissionFactor = 1.5; // kgCO2e per hour of dryer use
        $dishwasherEmissionFactor = 0.15; // kgCO2e per load in the dishwasher
        $electronicEmissionFactor = 0.1; // kgCO2e per per hour for a mix of electronic devices

    
        // Calculate carbon footprint for each energy-related activity
        $heatingCarbonFootprint = $heatingHours * $heatingEmissionFactor;
        $acCarbonFootprint = $acHours * $acEmissionFactor;
        $laundryCarbonFootprint = $laundryLoads * $laundryEmissionFactor;
        $dryerCarbonFootprint = $dryerHours * $dryerEmissionFactor;
        $dishwasherCarbonFootprint = $dishwasherLoads * $dishwasherEmissionFactor;
        $electronicCarbonFootprint = $electronicEmissionFactor * $electronicHours;
    
        // Sum up the carbon footprints for all energy-related activities
        $totalEnergyCarbonFootprint = $heatingCarbonFootprint + $acCarbonFootprint + $laundryCarbonFootprint +
                                     $dryerCarbonFootprint + $dishwasherCarbonFootprint +  $electronicCarbonFootprint;
    
        return $totalEnergyCarbonFootprint;
    }

    function weeklyLogUpToDate($con) {
        // Get the current week number
        $today = new DateTime('now');
        $firstDayOfMonth = new DateTime('first day of this month');
        $daysDiff = $today->diff($firstDayOfMonth)->days;
        $weekNumber = ceil(($daysDiff + 1) / 7);
    
        // Get the month name
        $month = $today->format('F');
    
        // Get the userID from the session
        $userID = $_SESSION['userID'];
    
        // Check if there is an entry for the current week in the current month
        $checkQuery = "SELECT * FROM weeklylog WHERE userID = '$userID' AND weekNo = '$weekNumber' AND month = '$month'";
        $result = mysqli_query($con, $checkQuery);
    
        if ($result && mysqli_num_rows($result) > 0) {
            // User has already entered the weekly log for the current week in the current month
            return true;
        } else {
            // User has not entered the weekly log for the current week in the current month
            return false;
        }
    }
    
?>

