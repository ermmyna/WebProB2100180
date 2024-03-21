<?php
include("carbon_calc.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Weekly Activity Log</title>
    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- CSS FILES End -->

<style>

#container {
  max-width: 700px; 
}
.step-container {
      position: relative;
      text-align: center;
      transform: translateY(-43%);
}

    .step-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #fff;
      border: 2px solid #66bb6a;
      line-height: 30px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
      cursor: pointer; 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    h4{
        color: #66bb6a !important; 
        font-family: 'Poppins', sans-serif !important;
        text-align:center;
        margin-bottom:5%;
    }

    #activity-log-form{
		overflow-x: hidden;
	}

    #bikeGif{
        width:180px;
        height:180px;
        z-index: index 2;
    }
    
    #bikeGif {
    position: relative;
    animation: cycleAnimation 6s linear infinite; 
    z-index: 1;
}


@keyframes cycleAnimation {
    0% {
        left: -50px; /* Initial position outside the container on the left */
        bottom: -35px; /* Initial position below the container */
        transform: translateY(0);
    }
    10% {
        left: 10%; /* Initial position outside the container on the left */
        bottom: -6px; /* Initial position below the container */
        transform: translateY(10px);
    }
    25% {
        left: 25%; /* Move to the right, slightly down */
        bottom: -6px; /* Initial position below the container */
        transform: translateY(10px);
    }
    50% {
        left: 50%; /* Move further right, slightly up */
        bottom: -6px; /* Initial position below the container */
        transform: translateY(90px);
    }
    75% {
        left: 75%; /* Move to the right, slightly down again */
        bottom: -6px; /* Initial position below the container */
        transform: translateY(90px);
    }
    100% {
        left: calc(100% + 50px); /* Move to the right, beyond the container */
        bottom: -7px; /* Initial position below the container */
        transform: translateY(0);
    }
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
            <h1>Weekly Activity Log</h1>
        </div>
    </section>
    <!--Inner Header End--> 

    <!-- Activity Log Form Start -->
    <div id="container" class="container mt-5">
        <div class="progress px-1" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="step-container d-flex justify-content-between">
            <div class="step-circle" onclick="displayStep(1)">1</div>
            <div class="step-circle" onclick="displayStep(2)">2</div>
            <div class="step-circle" onclick="displayStep(3)">3</div>
        </div>

            <form id="activity-log-form" action="carbon_calc.php" method="post" enctype="multipart/form-data">
               <div class="step step-1">
                <h4>Transportation</h4>
                  <!-- TRANSPORTATION METHOD -->

                     <div id="car_owner_questions" class="form-group">
                        <!-- Car owner questions -->
                        <label>How many kilometers did you drive your car this week?</label>
                        <input type="number" name="car_kilometers" min="0" step="1" class="form-control">
                        <label>Were there any carpooling instances this week? If yes, how many times?</label>
                        <input type="number" name="carpool_instances" min="0" step="1" class="form-control">
                     </div>

                     <div id="public_transportation_questions" class="form-group">
                        <!-- Public transportation questions -->
                        <label>How many times did you use public transportation this week?</label>
                        <input type="number" name="public_transportation_times" min="0" step="1" class="form-control">
                     </div>

                     <div id="active_commuter_questions" class="form-group">
                        <!-- Active commuter questions -->
                        <label>How many days did you walk or cycle as your primary mode of transportation this week?</label>
                        <input type="number" name="active_commuter_days" min="0" step="1" class="form-control">
                     </div>

                     <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success next-step">Next</button>
                     </div>
                </div>

                <div class="step step-2">
                <h4>Meals of the week</h4>

                     <!-- DIETARY PREFERENCES -->

                     <div id="meat_lover_questions" class="form-group">
                        <!-- Meat lover questions -->
                        <label>How many servings of red meat (beef, lamb, pork) did you consume this week?</label>
                        <input type="number" name="red_meat_servings" min="0" step="1" class="form-control">
                        <label>How many servings of poultry (chicken, turkey) did you consume this week?</label>
                        <input type="number" name="poultry_servings" min="0" step="1" class="form-control">
                        <label>How many servings of fish did you consume this week?</label>
                        <input type="number" name="fish_servings" min="0" step="1" class="form-control">
                     </div>

                     <div id="vegetarian_questions" class="form-group">
                        <!-- Vegetarian questions -->
                        <label>How many plant-based meals did you have this week?</label>
                        <input type="number" name="plant_based_meals" min="0" step="1" class="form-control">
                        <label>How many servings of tofu or other plant-based protein did you consume?</label>
                        <input type="number" name="plant_protein_servings" min="0" step="1" class="form-control">
                     </div>

                     <div id="mixed_diet_questions" class="form-group">
                        <!-- Mixed diet questions -->
                        <label>Specify the number of meat-based and plant-based meals you had this week.</label>
                        <input type="text" name="mixed_diet_meals" class="form-control">
                     </div>

                     <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success prev-step">Previous</button>
                        <button type="button" class="btn btn-success next-step">Next</button>
                     </div>
                </div>

                <div class="step step-3">
                <!-- Step 3 form fields here -->
                <h4>Energy Consumption</h4>

                     <!-- ENERGY CONSUMPTION -->

                     <div id="heating_cooling_questions" class="form-group">
                        <!-- Heating and Cooling questions -->
                        <label>On average, how many hours per day did you use heating this week?</label>
                        <input type="number" name="heating_hours" min="0" step="1" class="form-control">
                        <label>On average, how many hours per day did you use air conditioning this week?</label>
                        <input type="number" name="ac_hours" min="0" step="1" class="form-control">
                     </div>

                     <div id="appliances_questions" class="form-group">
                        <!-- Energy-Intensive Appliances questions -->
                        <label>How many loads of laundry did you do using a washing machine this week?</label>
                        <input type="number" name="laundry_loads" min="0" step="1" class="form-control">
                        <label>How many hours did you use a dryer this week?</label>
                        <input type="number" name="dryer_hours" min="0" step="1" class="form-control">
                        <label>How many loads did you run in the dishwasher this week?</label>
                        <input type="number" name="dishwasher_loads" min="0" step="1" class="form-control">
                     </div>

                     <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success prev-step">Previous</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                </div>
        </form>

                </div>


                  <!-- JAVASCRIPT -->

                  <script>
                     // Function to show/hide questions based on user's transportation method
                     function showHideQuestions() {
                        var transportation = "<?php echo $user_transportation; ?>";
                        var diet = "<?php echo $user_diet; ?>";

                        // Hide all question sections first
                        document.getElementById('car_owner_questions').style.display = 'none';
                        document.getElementById('public_transportation_questions').style.display = 'none';
                        document.getElementById('active_commuter_questions').style.display = 'none';

                        document.getElementById('meat_lover_questions').style.display = 'none';
                        document.getElementById('vegetarian_questions').style.display = 'none';
                        document.getElementById('mixed_diet_questions').style.display = 'none';

                        // Show relevant question section based on user's transportation method
                        if (transportation === 'car_owner') {
                              document.getElementById('car_owner_questions').style.display = 'block';
                        } else if (transportation === 'public_transportation') {
                              document.getElementById('public_transportation_questions').style.display = 'block';
                        } else if (transportation === 'active_commuter') {
                              document.getElementById('active_commuter_questions').style.display = 'block';
                        }

                        // Show relevant question section based on user's diet
                        if (diet === 'meat_lover') {
                              document.getElementById('meat_lover_questions').style.display = 'block';
                        } else if (diet === 'vegetarian') {
                              document.getElementById('vegetarian_questions').style.display = 'block';
                        } else if (diet === 'mixed_diet') {
                              document.getElementById('mixed_diet_questions').style.display = 'block';
                        }
                     }

                     // Call the function initially to set the initial state of the form
                     showHideQuestions();
                  </script> 
                  <script>
                                    
                    var currentStep = 1;

                    function displayStep(stepNumber) {
                        if (stepNumber >= 1 && stepNumber <= 3) {
                            $(".step-" + currentStep).hide();
                            $(".step-" + stepNumber).show();
                            currentStep = stepNumber;
                            updateProgressBar();
                        }
                    }

                    function updateProgressBar() {
                        var progressPercentage = ((currentStep - 1) / 2) * 100;
                        $(".progress-bar").css("width", progressPercentage + "%");
                        $(".progress-bar").css("background-color", "#66bb6a");
                    }

                    $(document).ready(function () {
                        $('#activity-log-form').find('.step').slice(1).hide();

                        $(".next-step").click(function () {
                            console.log("Next button clicked");
                            if (currentStep < 3) {
                                $(".step-" + currentStep).addClass("animate__fadeOutLeft");
                                currentStep++;
                                setTimeout(function () {
                                    $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                                    updateProgressBar();
                                }, 500);
                            }
                        });

                        $(".prev-step").click(function () {
                            console.log("previous button clicked");
                            if (currentStep > 1) {
                                $(".step-" + currentStep).addClass("animate__fadeOutRight");
                                currentStep--;
                                setTimeout(function () {
                                    $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                                    updateProgressBar();
                                }, 500);
                            }
                        });

                        updateProgressBar();
                    });

                      
                    </script>
                    <img src="images/lets-go-outside-saying-hello.gif" alt="Bike Ride Gif" id="bikeGif">

      <!-- Activity Log Form End -->

      <!-- Footer section -->
      <div class="ftco-section wf100">
            <footer class="footer">
              <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
                <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
              </svg>
            </section>
            <footer class="footer-03">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="d-flex align-items-center justify-content-between mb-4">
                               
                              <div class="logo-space">
                                  <img src="images/EcoTrace Logo.png" alt="Eco Trace Logo" class="logo-img">
                              </div>
                          </div>
              
                           <div class="row">
                               <div class="col-md-6 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Carbon Calculator</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">How it Works</a></li>
                                       <li><a href="#" class="py-1 d-block">Log Your Activities</a></li>
                                       <li><a href="#" class="py-1 d-block">Reduce Your Footprint</a></li>
                                   </ul>
                               </div>
                               <div class="col-md-4 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Resources</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">Blog</a></li>
                                       <li><a href="#" class="py-1 d-block">Educational Materials</a></li>
                                       <li><a href="#" class="py-1 d-block">FAQs</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row justify-content-end">
                               <div class="col-md-12 col-lg-11 mb-md-0 mb-4">
                                   
                                   <h2 class="footer-heading mt-5">Connect With Us</h2>
                                   <ul class="ftco-footer-social p-0">
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                   </ul>
                                   <h2 class="footer-heading mt-5">Subscribe to Our Newsletter</h2>
                                   <form action="#" class="subscribe-form">
                                       <div class="form-group d-flex">
                                           <input type="text" class="form-control rounded-left" placeholder="Enter your email address">
                                           <input type="submit" value="Subscribe" class="form-control submit px-3 rounded-right">
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-5 pt-4 border-top">
                       <div class="col-md-6 col-lg-8">
                           <p class="copyright">© <script>document.write(new Date().getFullYear());</script> All rights reserved | EcoTrace - Track and Reduce Your Carbon Footprint</p>
                       </div>
                       <div class="col-md-6 col-lg-4 text-md-right">
                           <p class="mb-0 list-unstyled">
                               <a class="mr-md-3" href="#">Terms &amp; Conditions</a>
                               <a class="mr-md-3" href="#">Privacy Policy</a>
                           </p>
                       </div>
                   </div>
               </div>
           </footer>
        </div>
  </div>
  <!--   JS Files Start  --> 
  <script src="js/jquery-migrate-1.4.1.min.js"></script> 
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/owl.carousel.min.js"></script> 
  <script src="js/isotope.min.js"></script> 
  <script src="js/main.js"></script>
</body>
</html>