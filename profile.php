<?php
session_start();
require("connection.php");

// Check if the database connection is established
if (!$con) {
    // Handle error if database connection fails
    echo "Failed to connect to the database.";
    exit();
}

// Retrieve user ID from the session after successful login
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

// Fetch user data from the database
$sql = "SELECT * FROM user WHERE userID = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $userID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if execute() was successful
if (!$result) {
    // Handle error if execute() fails
    echo "Failed to execute the SQL statement.";
    exit();
}

// Fetch user data as an associative array
$user = mysqli_fetch_assoc($result);

// Check if user data was found
if (!$user) {
    // Handle error if user data is not found
    echo "User data not found!";
    exit();
}

// Extract user data
$username = $user['username'];
$firstName = $user['firstName'];
$lastName = $user['lastName'];
$email = $user['email'];
$contactNumber = $user['contactNumber'];
$commutingMethod = $user['commutingMethod'];
$dietPreferences = $user['dietPreferences'];
$energySource = $user['energySource'];

// Free the result set
mysqli_free_result($result);
// Close the prepared statement
mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.png">
  <title>Profile Page</title>
  <!-- CSS FILES START -->
  <link href="css/custom3.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/slick.css" rel="stylesheet">
  <!-- CSS FILES End -->

   <style>
      /* Style the modal */
      .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      }

      /* Modal content */
      .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      }

      /* Close button */
      .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      }

      .close:hover,
      .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
      }

   </style>

</head>
<body>
   <div class="wrapper">
      <!--Header Start-->
      <header class="header-style-2">
         <nav class="navbar navbar-expand-lg">
            <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="events-grid.html">Events</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="causes.html">Causes</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blogs</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Pages</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                     </li>
                  </ul>

                  <li class="nav-item" style="list-style: none;">
                  <a class="login-btn" href="login-page" role="button"> Login </a>
               </li>
            </div>
      
         </nav>
         
      </header>
      <!-- Header End -->
      <!--Inner Header Start-->
      <section class="wf100 inner-header">
         <div class="container">
            <h1>My Account </h1>
         </div>
      </section>
      <!--Inner Header End--> 

      <div class="profileContainer">
         <div class="main-body">
               <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex flex-column align-items-center text-center">
                              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture" class="rounded-circle" width="150">
                              <div class="mt-3">
                                 <h4>John Doe</h4>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                 <a class="aboutUs" href="#">Edit Profile</a> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-7">
                  <div class="card mb-1">
                     <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $username; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $firstName; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $lastName; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $email; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Contact</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $contactNumber; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Commuting Method</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $commutingMethod; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Dietary Preferences</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $dietPreferences; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Energy Source</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $energySource; ?>
                        </div>
                        </div>
                     </div>
                  </div>

                  <div class="row gutters-sm">
                     <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                        <div class="card-body">
                           <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                           <small>Web Design</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Website Markup</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>One Page</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Mobile Template</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Backend API</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                        </div>
                        </div>
                     </div>
                     <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                        <div class="card-body">
                           <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                           <small>Web Design</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Website Markup</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>One Page</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Mobile Template</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <small>Backend API</small>
                           <div class="progress mb-3" style="height: 5px">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                        </div>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

   <!-- FIRST-TIME LOGIN FORM -->
   <div id="first-login-modal" class="modal">
      <h1>Let us know you better!</h1>
      <div class="modal-content">
         <span class="close">&times;</span>
         <h2>First Login Questionnaire</h2>
         <form id="first-login-form">
            <label for="transportation">What is your primary mode of transportation?</label><br>
            <select id="transportation" name="transportation">
               <option value="car_owner">Car owner</option>
               <option value="public_transportation">Public transportation user</option>
               <option value="active_commuter">Active commuter (walk, cycle)</option>
               <option value="other_transport">Other</option>
            </select>
            <input type="text" id="other_transport_text" name="other_transport" style="display: none;" placeholder="Please specify"><br>

            <label for="dietary_preferences">How would you describe your dietary preferences?</label><br>
            <select id="dietary_preferences" name="dietary_preferences">
               <option value="meat_lover">Meat lover</option>
               <option value="vegetarian">Vegetarian</option>
               <option value="vegan">Vegan</option>
               <option value="mixed_diet">Mixed diet</option>
               <option value="other_diet">Other</option>
            </select>
            <input type="text" id="other_diet_text" name="other_diet" style="display: none;" placeholder="Please specify"><br>

            <label for="housing">Do you live in a house or an apartment?</label><br>
            <input type="radio" id="house" name="housing" value="house">
            <label for="house">House</label><br>
            <input type="radio" id="apartment" name="housing" value="apartment">
            <label for="apartment">Apartment</label><br>

            <label for="air_conditioning">Do you have air conditioning?</label><br>
            <input type="radio" id="ac_yes" name="air_conditioning" value="yes">
            <label for="ac_yes">Yes</label><br>
            <input type="radio" id="ac_no" name="air_conditioning" value="no">
            <label for="ac_no">No</label><br>

            <label for="household_size">How many people are there in your household?</label><br>
            <select id="household_size" name="household_size">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5+">5+</option>
            </select><br>

            <button type="submit">Submit</button>
         </form>
         <script>
            // JavaScript to toggle the visibility of the text input fields based on the selected options
            document.getElementById('transportation').addEventListener('change', function() {
               var otherTransportInput = document.getElementById('other_transport_text');
               otherTransportInput.style.display = this.value === 'other_transport' ? 'block' : 'none';
            });

            document.getElementById('dietary_preferences').addEventListener('change', function() {
               var otherDietInput = document.getElementById('other_diet_text');
               otherDietInput.style.display = this.value === 'other_diet' ? 'block' : 'none';
            });
         </script>
      </div>
   </div>

   <script>
      // Function to open the first-login form modal
      function openFirstLoginForm() {
         console.log("Opening first-login-modal...");
         var firstLoginModal = document.getElementById("first-login-modal");
         console.log(firstLoginModal); // Check if the modal element is found
         if (firstLoginModal) {
            firstLoginModal.style.display = "block";
         } else {
            console.error("Could not find first-login-modal element.");
         }
      }

      // Get the modal
      var firstLoginModal = document.getElementById("first-login-modal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
         firstLoginModal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
         if (event.target == firstLoginModal) {
            firstLoginModal.style.display = "none";
         }
      }
   </script>

</div>
  <!-- Badges Section End -->
  <!--   JS Files Start  --> 
  <script src="js/jquery-3.3.1.min.js"></script> 
  <script src="js/jquery-migrate-1.4.1.min.js"></script> 
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/owl.carousel.min.js"></script> 
  <script src="js/jquery.prettyPhoto.js"></script> 
  <script src="js/isotope.min.js"></script> 
  <script src="js/main.js"></script>
</body>
</html>


