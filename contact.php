<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);

// If not logged in, redirect to auth.php
// if (!$loggedIn) {
//     header("Location: auth.php");
//     exit;
// }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into the database
    $query = "INSERT INTO Contacts (Name, Email, Subject, Message) 
              VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        // Data insertion successful
        $successMessage = "Message sent successfully!";
      } else {
        // Data insertion failed
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en-US">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AYU-SYNC</title>
  <link rel="stylesheet" href="css/components.css?v=1">
  <link rel="stylesheet" href="css/icons.css?v=1">
  <link rel="stylesheet" href="css/responsee.css?v=1">
  <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
  <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
  <link rel="stylesheet" href="css/contact.css?v=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- CUSTOM STYLE -->      
  <link rel="stylesheet" href="css/template-style.css?v=1">
  <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>   
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
<!-- Add this CSS code to style the FAQ section -->
<style>
    .faq-section {
        margin-top: 20px;
        width: 100%;
        
    }

    .faq-item {
        margin-bottom: 20px;
    }

    .faq-question {
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .faq-question:hover {
        background-color: #e0e0e0;
    }

    .faq-question h3 {
        font-weight: bold;
        margin: 0;
        color:black;
    }

    .faq-answer {
        display: none;
        margin-top: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    .faq-answer p {
        margin: 0;
    }
</style>

 </head>

 <!--
  You can change the color scheme of the page. Just change the class of the <body> tag. 
  You can use this class: "primary-color-white", "primary-color-red", "primary-color-orange", "primary-color-blue", "primary-color-aqua", "primary-color-dark" 
  -->
  
  <!--
  Each element is able to have its own background or text color. Just change the class of the element.  
  You can use this class: 
  "background-white", "background-red", "background-orange", "background-blue", "background-aqua", "background-primary" 
  "text-white", "text-red", "text-orange", "text-blue", "text-aqua", "text-primary"
  -->

 <body class="size-1520 primary-color-red background-dark">
    <form method="post" action="contact.php">
      <!-- HEADER -->
      <header class="grid">
        <!-- Top Navigation -->
        <nav class="s-12 grid background-none background-primary-hightlight" style="background-color: aliceblue;">
            <!-- logo -->
            <?php if ($loggedIn) : ?>
    <a href="welcome.php" class="m-12 l-3 padding-2x logo">
<?php else : ?>
    <a href="index.php" class="m-12 l-3 padding-2x logo">
<?php endif; ?> 
                <div style="display: inline-flex;">
                    <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg"></img>
                    <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg"></img>
                    <h1 style="margin-left: 10px; margin-top: -10px; font-weight: 700; font-size: 40px;">AYUSH</h1>
                </div>
            </a>
            <div class="top-nav s-12 l-9" style="margin-top: 10px;"> 
                <ul class="top-ul right chevron">
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>                
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="schemes.php">Schemes</a></li>
                    <li><a href="clinic.php">Clinics</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="auth.php">Login</a></li>
                    <?php endif; ?>             
                </ul>
            </div>
        </nav>
    </header>
      
      <div class="contact-wrap">
        <div class="contact-in">
          <h1>Contact Info</h1>
          <h2><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2> 
          <p>1800-11-22-02 (9:00 AM to 5:30 PM) (IST)</p>
          <h2><i class="fa fa-user" aria-hidden="true"></i> Web Information Manager</h2>
          <p>Ms. Kavita Garg, Joint Secretary
  
                      Room No.-212, Ayush Bhawan
                      
                      GPO Complex, New Delhi-110023
                      
                      Ph. 011-24651938
                      
                      webmanager-Ayush@gov.in</p>
          <h2><i class="fa fa-map-marker" aria-hidden="true"></i> Address</h2>
          <p>1. Ayush Bhawan, B Block, GPO Complex, INA, New Delhi – 110023</p>
  
                   <p>   2. Ayush NBCC Office, Nbcc Central Courtyard Garden 1241-1340 Flats, Block B, East Kidwai Nagar, Kidwai Nagar, New Delhi, Delhi 110023</p>
          <ul>
            <li><a href="https://www.facebook.com/moayush"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/moayush"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.youtube.com/@MinistryofAYUSHofficial/videos"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/ministryofayush/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div class="contact-in">
          <h1>Send a Message</h1>
          <?php if (!empty($successMessage)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>
          <form>
            <input name = "name" type="text" placeholder="Full Name" class="contact-in-input">
            <input name = "email" type="text" placeholder="Email" class="contact-in-input">
            <input name ="subject" type="text" placeholder="Subject" class="contact-in-input">
            <textarea name = "message" placeholder="Message" class="contact-in-textarea"></textarea>
            <input type="submit" value="SUBMIT" class="contact-in-btn">
            
          </form>
        </div>
        <div class="contact-in">
                  
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d895403.7728817703!2d76.76788985196046!3d28.75923866064765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce261a70c4d75%3A0x9b665605f37a7ef8!2sAyush%20Bhavan!5e0!3m2!1sen!2sin!4v1694680476113!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			</div>
      </div>
  </form>
<!-- FAQ Section -->
<section style="margin-top: 20px;">
    <div class="s-12 m-9 l-3 center">
        <h2 class="section-title">Frequently Asked Questions</h2>

        <!-- FAQ 1 -->
        <div class="faq-item">
            <div class="faq-question">
                <h3>What is Ayush?</h3>
                <label for="faq1"></label>
                <p>Ayush is an abbreviation for the Ministry of Ayurveda, Yoga & Naturopathy, Unani, Siddha, and Homoeopathy in India.</p>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item">
            <div class="faq-question">
                <h3>How can I contact Ayush?</h3>
                <label for="faq2"></label>
                <p>You can contact Ayush through our contact information provided on this page.</p>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item">
            <div class="faq-question">
                <h3>What services does Ayush provide?</h3>
                <label for="faq3"></label>
                <p>Ayush provides various healthcare services, including Ayurvedic treatments, yoga programs, and more. Please check our Services page for details.</p>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item">
            <div class="faq-question">
                <h3>Are there any upcoming events or workshops?</h3>
                <label for="faq4"></label>
                <p>Yes, we regularly organize events and workshops related to alternative medicine and holistic wellness. You can find event details on our Events page.</p>
            </div>
        </div>

        <!-- Add more FAQ items as needed -->

    </div>
</section>
  <footer class="grid">
        <!-- Footer - top -->
        <!-- Image-->
        <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url(img/img-04.jpg)"></div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">Who We Are?</h2>
           <p>The Ministry of Ayush, established in November 2014, aims to promote ancient healthcare systems. It evolved from the Department of ISM&H in 1995, later focusing on Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homoeopathy.</p>
        </div>
                
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">Contact Us</h2>
           <p><b class="text-primary margin-right-10">P</b> 1800-11-22-02 (9:00 AM to 5:30 PM) (IST)</p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:contact@sampledomain.com">contact@sampledomain.com</a></p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:office@sampledomain.com">office@sampledomain.com</a></p>
        </div>
        
        <!-- Footer - bottom -->
        <div class="s-12 text-center margin-bottom">
        <p class="text-size-12">Copyright 2023</p>
          <p class="text-size-12">All Rights Reserved</p>
          
          <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Team THE BOYS</a></p>
        </div>
      </footer> 
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript" src="js/template-scripts.js"></script>
      <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script>
  window.botpressWebChat.init({
      "composerPlaceholder": "Chat with AYU - BOT",
      "botConversationDescription": "",
      "botId": "c300e6db-bae7-4662-bfbf-24954df767c0",
      "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
      "messagingUrl": "https://messaging.botpress.cloud",
      "clientId": "c300e6db-bae7-4662-bfbf-24954df767c0",
      "lazySocket": true,
      "botName": "AYU - BOT",
      "stylesheet": "https://webchat-styler-css.botpress.app/prod/0e8d24bb-9850-4a5b-a267-6585a0afb882/v93347/style.css",
      "frontendVersion": "v1",
      "useSessionStorage": true,
      "enableConversationDeletion": true
  });
</script>
<!-- Add this JavaScript code at the bottom of your HTML, just before the closing </body> tag -->
<script>
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach((question) => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling; // Fix the property name
            if (answer) {
                answer.classList.toggle('faq-answer'); // Use the correct class name
            }
        });
    });
</script> 
</body>
</html>

