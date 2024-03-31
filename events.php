<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #addfad;
        }
        header {
    display: flex;
    flex-direction: column; /* Align items vertically */
    align-items: center; /* Center items horizontally */
    padding: 20px;
    background-color: #addfad; /* Adjust as needed */
    color: black;
}

.logo img {
    height: 125px; /* Adjust as needed */
    margin-top: -22px; /* Adjust as needed */
}

header h1 {
    font-size: 28px;
    margin-bottom: 0;
    margin-top: 10px; /* Adjust as needed */
}

nav {
    margin-top: 20px; /* Adjust as needed */
}

nav a {
    color: black;
    text-decoration: none;
    margin-left: 20px; /* Adjust as needed */
}

    </style>
</head>
<body>
    <header>
    <div class="logo">
        <img src="images/EcoTrace Logo.png" alt="EcoTrace Logo">
    </div>
        <h1>Upcoming Events</h1>
        <!-- Navigation link for home page -->
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
            
    <!--Inner Header Start-->
    <section class="wf100 p100 inner-header">
        <div class="container">
            <!-- Your inner header content goes here -->
        </div>
    </section>
         <h2 style="font-size: 22px; color:black;">Select a month:</h2>
         
         <select id="month" onchange="showList()">
         <option value="january">January</option>
         <option value="february">February</option>
         <option value="march">March</option>
         <option value="april">April</option>
         <option value="may">May</option>
         <option value="june">June</option>
         <option value="july">July</option>
         <option value="august">August</option>
         <option value="september">September</option>
         <option value="october">October</option>
         <option value="november">November</option>
         <option value="december">December</option>
         <option value="all">All</option>
      </select>

<div id="not-found" style="display:none; color:black;">Sorry! Events is not available on this month. We will try our best!</div>

         <!-- Inner Header End --> 
         <!-- Causes Start -->
         <section class="wf100 p80 events">
   <div class="event-grid-2">
       <div class="container">
           <div class="row">

               <!-- Blog Post Start for April -->
               <div class="col-lg-4 col-md-6 april">
                   <div class="event-post" id="event1">
                       <div class="event-thumb"> 
                           <img src="images/eg1.jpg" alt="">
                       </div>
                       <div class="event-txt">
                       <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Awareness Campaign to Save & Planting Forest</a></h5>
                       <br>    
                       <ul class="etime">
                               <li style="color: black;"><a href="#" style="color: black; text-decoration: none;"><strong>Organizers:</strong>Universiti Malaya (Institute of Biological Sciences)</li>
                               <br>
                               <li style="color: black;"><a href="#" style="color: black; text-decoration: none;"><strong>Date:</strong> 2 April, 2024</li>
                               <br>
                               <li style="color: black;"><a href="#" style="color: black; text-decoration: none;"><strong>Time:</strong> 9:00 am - 12:30 pm</li>
                           </ul>
                           <br>
           <!-- Edit and Delete Buttons -->
           <div style="text-align: center;" class="edit-delete-buttons">
           <button onclick="editEvent(1)">Edit</button>
            <br>
               <br>
               <button onclick="deleteEvent(1)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
           </div>
<br><br>
           <script>
function editEvent1(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
    function deleteEvent(eventId) {
        // Call a JavaScript function to delete event with ID "1"
        // Implement delete functionality here
    }
    </script>
                       </div>
                   </div>
                  </div>
                    <!--Blog Post End--> 

<!--Blog Post Start-->
<div class="col-lg-4 col-md-30 april">
   <div class="event-post" id="event2">
       <div class="event-thumb"> 
           <img src="images/eg2.jpg" alt="">
       </div>
       <div class="event-txt">
           <h5 style="color: white;"><a href="#" style="color: black; text-decoration: none;">Every Action Counts: Join for Our Future</a></h5>
           <br>
           <ul class="etime">
           <li style="color: black;"><a href="#" style="color: black; text-decoration: none;"><strong>Organizers: Universiti Putra Malaysia</strong> <?php echo $_POST['organizers']; ?></li>
            <br>
            <li><strong>Date: 23/4/2024</strong> <br>"Changed to:" <?php echo $_POST['date']; ?></li>
            <br>
            <li><strong>Time:9:00am - 1:00 pm <br>"Changed to:"</strong> <?php echo $_POST['time']; ?></li>   
           </ul>
           <br>
           <!-- Edit and Delete Buttons -->
           <div style="text-align: center;" class="edit-delete-buttons">
            <button onclick="editEvent(2)">Edit</button> <!-- Assuming event ID is 2 -->
            <br>
               <br>
               <button onclick="deleteEvent(2)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
               
               <script>
function editEvent(eventId) {
    // Construct the URL dynamically based on the event ID
    var url = 'event' + eventId + '.php';
    // Redirect to the dynamically generated URL
    window.location.href = url;

}
    function deleteEvent(eventId) {
        // Call a JavaScript function to delete event with ID "1"
        // Implement delete functionality here
    }
    </script>
            </div>
       </div>
   </div>
</div>

<!-- Include any JavaScript files -->

<script>
   function deleteEvent(eventId) {
    // Remove the event post from the DOM based on the eventId
    const eventPostToRemove = document.getElementById('event' + eventId);
    if (eventPostToRemove) {
        eventPostToRemove.remove();

        // Slide subsequent events left if the deleted event is event1 or event2 or event3
        if (eventId === 1 || eventId === 2 || eventId === 3) {
            for (let i = eventId + 1; i <= 6; i++) {
                const currentEventPost = document.getElementById('event' + i);
                if (currentEventPost) {
                    currentEventPost.style.transition = "transform 0.5s ease-in-out";
                    currentEventPost.style.transform = "translateX(-100%)"; // Slide left
                }
            }
        }
        
        // Position event4 beside event3 if the deleted event is event1 or event2
        if (eventId === 1 || eventId === 2) {
            const event4 = document.getElementById('event4');
            const event3 = document.getElementById('event3');
            if (event4 && event3) {
                event4.style.transition = "transform 0.5s ease-in-out";
                event4.style.transform = "translate(226%, -108%)"; // Beside event3
            }
        }
        // Position event5 beside event4 if the deleted event is event1 or event3
        if (eventId === 1 || eventId === 3) {
            const event5 = document.getElementById('event5');
            const event4 = document.getElementById('event4');
            if (event5 && event4) {
                event4.style.transition = "transform 0.5s ease-in-out";
                event4.style.transform = "translate(224%, -108%)"; // Beside event4
            }
        }
    }
}
          </script>

         <!--Blog Post End--> 
                     
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-5 may">
                        <div class="event-post" id="event3">
                           <div class="event-thumb"> 
                              <img src="images/eg3.jpg" alt=""></div>
                           <div class="event-txt">
                              <h5 style="color: white;"><a href="#" style="color: black; text-decoration: none;">Reimagine! Creative Solutions for Our Planet</a></h5>
                              <ul class="etime">
                                <br>
                                 <li><strong>Organizers:</strong>The Habitat Foundation (Yayasan Habitat)</li>
                                 <br>
                                 <li><strong>Date:</strong> 5 May, 2024</li>
                                 <br>
                                 <li><strong>Time:</strong> 9:30 am - 12:00 pm</li>
                              </ul>

                              <br>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: center;" class="edit-delete-buttons">
                                  <button onclick="editEvent(3)">Edit</button> <!-- Assuming event ID is 1 -->
                                  <br>
                                     <br>
                                     <button onclick="deleteEvent(3)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
                                 </div>
                              </div>
                              </div>
                     </div>

                    
                     <!--Blog Post End-->
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-6 may">
                        <div class="event-post" id="event4">
                           <div class="event-thumb"> 
                              <img src="images/eg4.jpg" alt=""></div>
                           <div class="event-txt">
                           <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Our Planet Needs You: Be the Change<Br> You Wish For</a></h5>
                              <ul class="etime">
                                <br>
                                 <li><strong>Organizers:</strong>Malaysian Green Technology Corporation </li>
                                 <br>
                                 <li><strong>Date:</strong> 19 May, 2024</li>
                                 <br>
                                 <li><strong>Time:</strong> 10:30 am - 1:30 pm</li>
                              </ul>
                              <br>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: center;" class="edit-delete-buttons">
                                  <button onclick="editEvent(4)">Edit</button> <!-- Assuming event ID is 1 -->
                                  <br>
                                     <br>
                                     <button onclick="deleteEvent(4)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
                                 <br><br><br>
                                    </div>
                              </div>
                              </div>
                     </div>
                     <!--Blog Post End--> 
                     <!--Blog Post Start-->
                     <div class="col-lg-4 col-md-6 june">
                        <div class="event-post" id="event5">
                           <div class="event-thumb"> 
                              <img src="images/eg5.jpg" alt=""></div>
                           <div class="event-txt">
                           <h5 style="color: black;"><a href="#" style="color: black; text-decoration: none;">Save the Planet, Don't Let It Fizzle!</a>
                              </h5>
                              <ul class="etime">
                                <br><br>
                              <li style="color: black;"><strong>Organizers:</strong> EcoFriend Malaysia</li>
                              <br>
                              <li style="color: black;"><strong>Date:</strong> 12 June, 2024</li>
                              <br>
                              <li style="color: black;"><strong>Time:</strong> 9:30 am - 02:00 pm</li>
                              </ul>
                              <br><br>
                                  <!-- Edit and Delete Buttons -->
                                 <div style="text-align: center;" class="edit-delete-buttons">
                                  <button onclick="editEvent(5)">Edit</button> <!-- Assuming event ID is 1 -->
                                  <br>
                                     <br>
                                     <button onclick="deleteEvent(5)">Delete</button> <!-- Call a JavaScript function to delete event with ID "1" -->
                                 </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <!-- Include any JavaScript files -->
                     <!--Blog Post End--> 
                     <!--Blog Post Start-->

                     <!--Sorting list of month of events-->
                     <script>
                     
                     function showList() {
                     var selectedMonth = document.getElementById("month").value;
                     var eventPosts = document.querySelectorAll('.events > .event-grid-2 > .container > .row > div');

                     eventPosts.forEach(function(post) {
                        if (selectedMonth === 'all' || post.classList.contains(selectedMonth)) {
                              post.style.display = 'block'; // Show selected month's posts or all posts if 'all' is selected
                        } else {
                              post.style.display = 'none'; // Hide posts of other months
                        }
                     });

                     var notFoundMessage = document.getElementById("not-found");

                     if (selectedMonth === 'all' || document.querySelectorAll('.events > .event-grid-2 > .container > .row > .' + selectedMonth).length > 0) {
                        notFoundMessage.style.display = 'none'; // Hide message if events found for selected month or if 'all' is selected
                     } else {
                        notFoundMessage.style.display = 'block'; // Show message if no events found for selected month
                     }
                  }
                     </script>
                     <br><br><br>
                     <!--Blog Post End--> 
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="gt-pagination mt20">
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
        
          <!-- Footer -->
    
      </div>
      <!--   JS Files Start  --> 
      <script src="js/jquery-3.3.1.min.js"></script> 
      <script src="js/jquery-migrate-1.4.1.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/isotope.min.js"></script> 

      <!-- Include any JavaScript files -->

      <script>
    // Retrieve updated event details from localStorage
    const updatedEvent = JSON.parse(localStorage.getItem('updatedEvent'));

    // Update event details on the page if they exist
    if (updatedEvent) {
        document.getElementById('eventName').textContent = updatedEvent.eventName;
        // Update other elements similarly using their IDs

        // Clear stored updated event details from localStorage
        localStorage.removeItem('updatedEvent');
    }
</script>

   </body>
</html>