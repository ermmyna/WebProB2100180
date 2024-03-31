<?php
// Function to check if user is logged in
function isLoggedIn() {
    // Implement your logic here to check if the user is logged in
}

// Function to check if weekly log is up to date
function weeklyLogUpToDate($con) {
    // Implement your logic here to check if the weekly log is up to date
}

// Establish a connection to your MySQL database
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "bit210"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chat Room</title>
    <!-- CSS FILES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css" rel="stylesheet">
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/notificationBell.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styles */
    </style>
</head>
<body>


    <div class="wrapper home2">
         <!--Header Start-->
      <header class="header-style-2">
         <nav class="navbar navbar-expand-lg">
               <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px; margin-left:30px;"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                           <a class="nav-link active" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="events.php">Events</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbonCalculator.php">Calculator</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="carbon_dash.php">Dashboard</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="display4.php">Learn</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                       <li class="nav-item">
                           <a class="nav-link" href="activity_log.php">Activity Log</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="history.php">History</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="socialInt(shareAchievement).html">Social</a>
                       </li>
                       <?php endif; ?>
                  </ul>
                  <?php if (isLoggedIn()): ?>
                     <!-- If user is logged in, show profile circle -->
                     <li class="nav-item" style="list-style: none;">
                     <!-- If user is not logged in, show login button -->
                     <div class="notification" >
                        <div class="notBtn" href="#">
                           <?php if (weeklyLogUpToDate($con)) : ?>
                              <div class="number"></div>
                           <?php else : ?>
                              <div class="number">1</div>
                           <?php endif; ?>
                              <i class="fas fa-bell" id="bell"></i>
                              <div class="box">
                                 <div class="display">
                                    <?php if (weeklyLogUpToDate($con)) : ?>
                                       <div class="container" style= "padding-top:25px;">
                                          <div class="row">
                                             <div class="col-3">
                                             <img class="icon" style="width:60px; margin-left:8px;" src="https://cdn-icons-png.flaticon.com/128/8832/8832119.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                             <div class="cent">You're all caught up!</div>
                                            </div>
                                          </div>
                                    <?php else : ?>
                                       <div class="container" style= "padding-top:22px;">
                                          <div class="row">
                                             <div class="col-3">
                                                   <img class="icon" style="width:50px;" src="https://cdn-icons-png.flaticon.com/128/10308/10308693.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                                   <div class="cent">Please update your weekly log for this week</div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </li>
                     <li class="nav-item profile-dropdown">
                        <img src="images/profile.jpg" class="profile" />
                        <ul class="profile-menu">
                           <li class="sub-item">
                               <a href="socialInt(chat).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Chat Room</p>
                               </a>
                           </li>
                           <li class="sub-item">
                               <a href="socialInt(shareAchivement).php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Share Achievements</p>
                               </a>
                           </li>
                           <li class="sub-item">
                               <a href="profile.php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Update Profile</p>
                               </a>
                           </li>
                           <!-- Other profile-related items -->
                           <li class="sub-item">
                                 <a href="index.php?logout=true" style="display: flex; align-items: center; text-decoration: none;"> <!-- Log out link -->
                                    <span class="material-icons-outlined"> logout </span>
                                    <p>Logout</p>
                                 </a>
                           </li>
                        </ul>
                     </li>

               <?php else: ?>
                     <li class="nav-item" style="list-style: none;">
                        <a class="login-btn" href="login.php" role="button"> Login </a>
                     </li>
               <?php endif; ?>
               
         </div>
         
         </nav>
         
      </header>
      <!-- Header End -->
<!--Inner Header Start-->
<section class="wf100 inner-header">
    <div class="container">
       <h1>Carbon Footprint Chat Room</h1>
    </div>
 </section>
 <!--Inner Header End--> 

<div class="container my-3">
    <div class="chat-container p-4 shadow">
        <h2 class="text-center">Chat Room</h2>
        <div class="d-flex justify-content-between my-3">
            <button id="back-button" class="btn btn-secondary">Back</button>
            <div class="btn-group-flex justify-content-between my-1">
                <button id="delete-button" class="btn btn-warning">Delete</button>
                <button id="clear-button" class="btn btn-danger">Clear Chat</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="chat-contacts list-group" id="chat-contacts">
                    <!-- Contacts will be dynamically added here -->
                </div>
            </div>
            <div class="col-8">
                <div class="chat-messages list-group" id="chat-messages">
                    <!-- Messages will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>
    <div class="message-input-container mt-3">
            
    <div class="input-group">
        <Br><Br>
        <input type="text" id="message-input" class="form-control" placeholder="Type your message...">
        <div class="input-group-append">
            <button id="send-button" class="btn btn-primary ml-2" type="button">Send</button>
        </div>
    </div>
</div>
</div>

<script>
    const chatContacts = document.getElementById('chat-contacts');
    const chatMessages = document.getElementById('chat-messages');
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const backButton = document.getElementById('back-button');
    const deleteButton = document.getElementById('delete-button');
    const clearButton = document.getElementById('clear-button');
    let selectedContact = null;
    let messagesHistory = {};

    const contacts = [
        { id: 1, name: 'John Doe' },
        { id: 2, name: 'Jane Smith' },
        { id: 3, name: 'Alice Johnson' }
    ];

    function displayContacts() {
        chatContacts.innerHTML = '';
        contacts.forEach(contact => {
            const contactElement = document.createElement('a');
            contactElement.textContent = contact.name;
            contactElement.classList.add('list-group-item', 'list-group-item-action');
            contactElement.setAttribute('data-contact-id', contact.id);
            chatContacts.appendChild(contactElement);
        });
    }

    // Function to display messages for selected contact
    function displayMessagesForContact(contactId) {
        chatMessages.innerHTML = '';
        const messages = messagesHistory[contactId] || [];
        messages.forEach(message => {
            displayMessage(message.sender, message.text, false); // Display without saving
        });
    }

    function selectContact(contactId, contactName) {
        document.querySelectorAll('.list-group-item-action').forEach(contact => {
            contact.classList.remove('active');
            contact.style.display = 'none';
        });
        
        const selectedContactElement = document.querySelector(`[data-contact-id="${contactId}"]`);
        selectedContactElement.classList.add('active');
        selectedContactElement.style.display = 'block';

        selectedContact = { id: contactId, name: contactName };
        displayMessagesForContact(contactId);
    }

    function sendMessage() {
        const messageText = messageInput.value.trim();
        if (messageText !== '' && selectedContact) {
            const message = { sender: 'You', text: messageText };
            displayMessage(message.sender, message.text, true);
            replyFromContact(selectedContact.name);
            messageInput.value = '';
            }
    }
    
    function scrollToBottom() {
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function displayMessage(sender, text, save) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('list-group-item');
        messageElement.textContent = `${sender}: ${text}`;
        chatMessages.appendChild(messageElement);

        if (save && selectedContact) {
            if (!messagesHistory[selectedContact.id]) {
                messagesHistory[selectedContact.id] = [];
            }
            messagesHistory[selectedContact.id].push({ sender, text });
        }

        // Scroll to the bottom of the chat window to show the latest message
        scrollToBottom();
    }

    // Function to simulate a reply from the contact
    function replyFromContact(contactName) {
        // Define arrays of reply texts for different scenarios
        const replyTexts = {
            general: [
                `Hi, this is ${contactName}. How can I assist you today?`,
                `Hello, ${contactName} here. What can I do for you?`,
                `Hey, it's ${contactName}. How can I help?`,
                `Hi there! ${contactName} speaking. What's up?`
            ],
            challenges: [
                `Hey! Facing any challenges lately? I'm here to listen and help if I can.`,
                `Remember, challenges are just opportunities in disguise!`,
                `Don't let challenges discourage you. You've got this!`
            ],
            achievements: [
                `Congratulations! Any recent achievements you'd like to share?`,
                `Wow! I'm proud of you for your recent achievements. Keep up the great work!`,
                `Your achievements inspire me. Keep reaching for the stars!`
            ],
            encouragement: [
                `Just dropping by to remind you, that you're capable of amazing things!`,
                `When things get tough, remember how far you've come already.`,
                `You're doing great! Keep pushing forward, even when it's tough.`
            ],
            carbonFootprint: [
                `Let's chat about reducing our carbon footprints. Do you have any strategies to share ?`,
                `Want to discuss tips for living a more eco-friendly lifestyle ?`,
                `Let's brainstorm ways to reduce our carbon footprints together !`
            ]
        };

        let categories = Object.keys(replyTexts);
        let randomCategory = 'general';
        if (messagesHistory[selectedContact.id] && messagesHistory[selectedContact.id].length > 1) {
            categories = categories.filter(category => category !== 'general');
            randomCategory = categories[Math.floor(Math.random() * categories.length)];
        }
        const randomIndex = Math.floor(Math.random() * replyTexts[randomCategory].length);
        const replyText = replyTexts[randomCategory][randomIndex];

        setTimeout(() => {
            displayMessage(contactName, replyText, true);
        }, 1000);
    }
  
chatContacts.addEventListener('click', event => {
    if (event.target.classList.contains('list-group-item-action')) {
        const contactId = event.target.getAttribute('data-contact-id');
        const contactName = event.target.textContent.trim();
        selectContact(contactId, contactName);
    }
});
  
sendButton.addEventListener('click', sendMessage);
messageInput.addEventListener('keypress', event => {
    if (event.key === 'Enter') {
        event.preventDefault(); // Avoid form submission
        sendMessage();
    }
});
  
backButton.addEventListener('click', () => {
    document.querySelectorAll('.list-group-item-action').forEach(contact => {
        contact.classList.remove('active');
        contact.style.display = 'block';
    });
    chatMessages.innerHTML = '';
    selectedContact = null;
});
  
    // Event listener for message deletion
deleteButton.addEventListener('click', () => {
    if (selectedContact) {
        const selectedMessageElement = chatMessages.querySelector('.selected');
        if (selectedMessageElement) {
            // Find the index of the message to remove from messagesHistory
            const messageIndex = Array.from(chatMessages.children).indexOf(selectedMessageElement);
            if (messageIndex > -1) {
                // Remove the message from the history
                messagesHistory[selectedContact.id].splice(messageIndex, 1);
                // Remove the message element from the display
                chatMessages.removeChild(selectedMessageElement);
            }
        }
    }
});

// Enhance the chatMessages click event handler to support selecting a message
chatMessages.addEventListener('click', event => {
    const clickedMessage = event.target;
    if (clickedMessage.classList.contains('list-group-item')) {
        // Clear any previously selected message's styling
        document.querySelectorAll('.chat-messages .list-group-item').forEach(message => {
            message.classList.remove('selected');
            message.style.backgroundColor = ''; // Reset background color to default
        });
        // Mark the clicked message as selected
        clickedMessage.classList.add('selected');
        clickedMessage.style.backgroundColor = 'lightgrey';
    }
});
  
clearButton.addEventListener('click', () => {
    if (selectedContact) {
        // Display a confirmation dialog
        const isConfirmed = confirm("Are you sure you want to clear the chat?");
        // Proceed to clear the chat only if the user confirmed
        if (isConfirmed) {
            messagesHistory[selectedContact.id] = [];
            chatMessages.innerHTML = '';
            // Optionally, you can add a message to indicate the chat was cleared
            alert("Chat has been cleared.");
        }
    }
});

  // Initialize the contacts display when the page loads
  displayContacts();
</script>

<!--Footer Section Start--> 
<?php if (isLoggedIn()): ?>  
         <div class="ftco-section wf100 pt80">
         <?php else: ?>
        <div class="ftco-section wf100">
        <?php endif; ?>
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
      <!--Footer Section End-->  

</body>
</html>         