<?php
require("connection.php");

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}

// Check if it's the user's first login
if (isset($_GET['first_login']) && $_GET['first_login'] === 'true') {
   echo '<script>openFirstLoginForm();</script>';
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
  <title>Profile Page</title>
  <!-- CSS FILES START -->
  <link href="css/custom3.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
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

      <div class="container">
         <div class="main-body">
               <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                           <h4>John Doe</h4>
                           <p class="text-secondary mb-1">Full Stack Developer</p>
                           <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                           <button class="btn btn-primary">Follow</button>
                           <button class="btn btn-outline-primary">Message</button>
                        </div>
                        </div>
                     </div>
                  </div>
                  <div class="card mt-3">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">https://bootdey.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">@bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                     </ul>
                  </div>
                  </div>
                  <div class="col-md-8">
                  <div class="card mb-3">
                     <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           zoyak
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Zoya
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Khan
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           fip@jukmuh.al
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Contact Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           (239) 816-9029
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Commuting Method</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Car
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Dietary Preferences</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Vegetarian
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Energy Source</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Electicity (Grid)
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-12">
                           <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
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

   <!-- EDIT PROFILE -->
   <!-- Modal -->
   <div id="editProfileModal" class="modal">
      <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Edit Profile</h2>
      <form id="editProfileForm">
         <!-- Input fields for editing profile details -->
         <label for="name">Name:</label>
         <input type="text" id="name" name="name" value="John Doe">
         
         <!-- Add more input fields for other profile details -->
         
         <button type="submit">Save Changes</button>
      </form>
      </div>
   </div>
   
   <script>
      // Function to open the first-login form modal
      function openFirstLoginForm() {
         var firstLoginModal = document.getElementById("first-login-modal");
         firstLoginModal.style.display = "block";
      }

      // Get the modal
      var firstLoginModal = document.getElementById("first-login-modal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal
      function openModal() {
         firstLoginModal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
         firstLoginModal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal) {
         firstLoginModal.style.display = "none";
      }
      }

      // Get the Edit Profile modal
      var editProfileModal = document.getElementById("editProfileModal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[1]; // Assuming it's the second element with class "close"

      // When the user clicks on the button, open the modal
      function openEditProfileModal() {
         editProfileModal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
         editProfileModal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
         if (event.target == editProfileModal) {
            editProfileModal.style.display = "none";
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
  <script src="js/custom.js"></script>
  <script src="js/profile.js"></script>
</body>
</html>


