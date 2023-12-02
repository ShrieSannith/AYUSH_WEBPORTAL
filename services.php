<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);
?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>AYU-SYNC</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <!-- CUSTOM STYLE -->      
      <link rel="stylesheet" href="css/template-style.css">
      <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
      
      <style>
        /* Add this CSS as internal style */
        section.grid:nth-child(odd) img,
        section.grid:nth-child(odd) div.background-white {
            height: 400px; /* Adjust the height as needed */
        }

        section.grid:nth-child(even) img,
        section.grid:nth-child(even) div.background-dark {
            height: 400px; /* Adjust the height as needed */
        }

        section.grid:nth-child(odd) div.background-aqua {
            height: 400px; /* Adjust the height as needed */
        }

        section.grid:nth-child(even) img,
        section.grid:nth-child(even) div.background-white {
            height: 400px; /* Adjust the height as needed */
        }

        section.grid:nth-child(odd) div.background-dark {
            height: 400px; /* Adjust the height as needed */
        }

        section.grid:nth-child(even) img,
        section.grid:nth-child(even) div.background-aqua {
            height: 400px; /* Adjust the height as needed */
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
              <?php if ($loggedIn) : ?>
                <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>                
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="schemes.php">Schemes</a></li>
                <li><a href="clinic.php">Clinics</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($loggedIn) : ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="auth.php">Login</a></li>
                    <?php endif; ?>
                </ul>
           </div>
        </nav>
      </header>
      
      <!-- MAIN -->
      <main role="main">
        <!-- TOP SECTION -->
        <header class="grid">
        	<div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Our Services</h1>
            <p class="text-size-20 text-white text-center center">Elevating Lives, One Service at a Time: Discover Our Commitment to Quality, Innovation, and Your Success with Our Wide Range of Services.</p>
          </div>
        </header>
  
        
        <!-- SECTION 1 -->
        <section class="grid">
          <div class="m-12 l-6 padding-2x background-white">
            <p class="text-strong text-size-80 text-red">01</p>
            
            <h2 class="text-size-50 text-line-height-1 text-dark"><b>Ayurveda</b></h2>
            
            <p>Ayurveda is the time tested traditional system of medicine of India. The term 'Ayurveda' meaning 'the knowledge of life' comprises of two Sanskrit words viz 'Ayu' meaning 'Life' and 'Veda' meaning 'Knowledge' or 'Science'.</p>

          </div>
          
          <!-- Image-->
          <img class="m-12 l-6" src="img/ayurveda1.jpg" style="width: 800px;">
        </section>
        

        <section class="grid">
          <!-- Image-->
          <img class="m-12 l-6" src="img/yoga1.jpg" style="width: 800px;" >
          
          <div class="m-12 l-6 padding-2x background-dark">
            <p class="text-strong text-size-80 text-white">02</p>
            
            <h2 class="text-size-50 text-line-height-1 text-white"><b>Yoga & Naturopathy</b></h2>

            <p>Yoga, from Sanskrit 'yuj,' unites personal and universal consciousness. Naturopathy, drug-free, relies on natural materials for cost-effective health and wellness.</p>
          </div>
        </section> 
        
        <!-- SECTION 3 -->
        <section class="grid">
          <div class="m-12 l-6 padding-2x background-aqua" >
            <p class="text-strong text-size-80 text-white">03</p>
            
            <h2 class="text-size-50 text-line-height-1 text-white"><b>Unani</b></h2>
            <p>Unani System of medicine is a comprehensive medical system, which provides preventive, promotive, curative and rehabilitative health care. The system is holistic in nature and takes into account the whole personality of an individual rather than taking a reductionist approach townards disease.</p>
          </div>
          
          <!-- Image-->
          <img class="m-12 l-6" src="img/unani1.jpg" style="width: 800px;">
        </section> 

        <section class="grid">
          <!-- Image-->
          <img class="m-12 l-6" src="img/siddha1.jpg" style="width: 800px;">
          
          <div class="m-12 l-6 padding-2x background-white">
            <p class="text-strong text-size-80 text-red">04</p>
            
            <h2 class="text-size-50 text-line-height-1 text-dark"><b>Siddha</b></h2>

            <p>The Siddha system is ancient system of medicine in India. The word 'Siddha' is derived from the root word 'Citti" meaning attainement of perfection, eternal bliss and accomplishment.</p>

          </div>
        </section> 

        
        <section class="grid">

          
          <div class="m-12 l-6 padding-2x background-dark">
            <p class="text-strong text-size-80 text-red">05</p>
            
            <h2 class="text-size-50 text-line-height-1 margin-bottom-30 text-white"><b>Sowa Rigpa</b></h2>
          <p>Sowa-Rigpa” is the traditional medicine of many parts of the Himalayan region used mainly by the Tribal and bhot people. Sowa-Rigpa(Bodh-Kyi) means 'science of healing' and the practitioners of this medicine are known as Amchi.</p>          </div>
          
          <!-- Image-->
          <img class="m-12 l-6" src="img/Sowa Rigpa1.jpg" style="width: 800px;">
        </section> 


        <section class="grid">
          <!-- Image-->
          <img class="m-12 l-6" src="img/homeopathy1.jpg" style="width: 800px;" >
          
          <div class="m-12 l-6 padding-2x background-aqua">
            <p class="text-strong text-size-80 text-white">06</p>
            
            <h2 class="text-size-50 text-line-height-1 text-white"><b>Homeopathy</b></h2>

            <p>'Homoeopathy' was introduced as a scientific system of drug therapeutics by a German Physician, Dr. Christian Frederick Samuel Hahnemann in 1805. The principle of Homoeopathy is Similia Similibus Curentur i.e. let likes be trated by likes.</p>

          </div>
        </section> 

        <!-- SECTION 6 -->
        <section class="grid margin-bottom">
          <div class="s-12 padding-2x background-dark">
            <a href="contact.php" class="s-12 m-9 l-3 center button text-size-20 text-white background-red">CONTACT US</a>
          </div>
        </section>      
      </main>
       <!-- FOOTER -->
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
   </body>
</html>