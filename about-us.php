<?php
session_start();

$loggedIn = isset($_SESSION['U_ID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AYU-SYNC</title>
    <!-- <link rel="stylesheet" href="css/components.css?v=1"> -->
    <!-- <link rel="stylesheet" href="css/icons.css?v=1"> -->
    <!-- <link rel="stylesheet" href="css/resp.css?v=1"> -->
    <link rel="stylesheet" href="css/responsee.css?v=1">
    <!-- <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1"> -->
    <!-- <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">  -->
    <!-- <link rel="stylesheet" href="css/style.css?v=1">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css?v=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
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
                         
<div class="container">
  
  <div class="about">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="./img /ayush-about-image.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width=auto height=auto loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-primary" >About AYUSH</h1>
            <p class="lead " >AYUSYNC is a trusted gateway to holistic wellness through Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homeopathy (AYUSH).At AYUSUNC, we are propelled by an unwavering and profound passion for holistic wellness. Our journey is driven by an unshakeable belief in the remarkable healing potential that resides within the rich tapestry of traditional Indian healthcare systems.</p>
            
          </div>
        </div>


  </div>


  
  <div class="ourMission mr-5">
      <div class=" position-static">
          
          <h2 class="mb-0 text-body-primary">Our Mission</h2>
          
          <p class="lead"> We are committed to promoting natural, holistic, and time-tested approaches to health and well-being. Our mission is to empower individuals to take charge of their health through the ancient wisdom of AYUSH systems.</p>
        </div>


  </div>
  <div class="ourVision">
      <div class="position-static">
          
          <h2 class="mt-5 text-body-primary">Our Vision</h2>
          
          <p class="lead mb-5">We envision a world where individuals lead balanced, harmonious lives by embracing the natural healing modalities offered by AYUSH. We aim to be a trusted resource for those seeking alternative and complementary healthcare solutions.</p>
  </div>

  <div>
    <h2 class="mb-3">Ministry Head</h2>

    <div class="row">
      <div class="col-lg-6">
      <img src="./img/min_1.jpg" class="col-xs-6 col-sm-6 col-md-3 col-lg-3 bd-placeholder-img rounded-circle" ></img>
        <h2 class="fw-normal">Shri Sarbananda Sonowal</h2>
        <p class="bla" class="text-white text-left text-dark text-size-16">Hon'ble Cabinet Minister<br>
          Ministry of Ayush & Ministry of Ports, Shipping and Waterways<br>
          011-24651955, 011-24651935<br>
          minister-ayush@nic.in</p>
        
      </div>
      <div class="col-lg-6 ">
      <img src="./img/minister2_.jpg" class="col-xs-6 col-sm-6 col-md-3 col-lg-2.4 bd-placeholder-img rounded-circle "></img>        
      <h2 class="fw-normal">Dr. Munjpara Mahendrabhai Kalubhai</h2>
        <p class="bla" class="text-white text-left text-size-16">Hon’ble Minister of State<br>
          Ministry of Ayush and Ministry of Women & Child Development<br>
          011-20819424<br>
          mahendra.munjpara.sansad.nic.in<br>
          Member of Parliament (Lok Sabha) from Surendranagar, Gujarat.</p>
      </div>
      
    </div>


  </div>
  <div >
      <h2 class="mb-3">Testimonials</h2>
      <div class="card mb-3">
        
        <div class="card-body">
          <blockquote class="blockquote mb-0">
<p>" I have been practicing yoga for years, but your website has taken my journey to a whole new level. The detailed yoga guides, videos, and expert advice have not only improved my flexibility but also brought peace to my mind. Thank you for being my trusted companion on this holistic wellness journey! "</p>
            <footer class="blockquote-footer">Alex Smith <br/>
              <cite title="Source Title">Yoga Enthusiast</cite></footer>
          </blockquote>
        </div>
      </div>

      <div class="card mb-3">
        
        <div class="card-body">
          <blockquote class="blockquote mb-0">
<p>" As someone who has always believed in Ayurveda, I'm thrilled to have found AYUSH website. The abundance of information on Ayurvedic herbs, remedies, and lifestyle tips is invaluable. Your dedication to preserving and promoting our ancient healing traditions is commendable. Keep up the great work! "

</p>
            <footer class="blockquote-footer">Priya Das
              <br/>
              <cite title="Source Title">Ayurveda Believer </cite></footer>
          </blockquote>
        </div>
      </div>

      <div class="card mb-3">
        
        <div class="card-body">
          <blockquote class="blockquote mb-0">
<p>" I've always preferred natural healing methods, and AYUSH has become my go-to platform for all things naturopathy. From detox diets to naturopathy, your website has guided me towards a healthier and more holistic lifestyle. I appreciate the effort you put into sharing these life-changing practices with the world "</p>
            <footer class="blockquote-footer">Kristina Shaw
              <br/>
              <cite title="Source Title">
                Naturopathy Advocate</cite></footer>
          </blockquote>
        </div>
      </div>

      


    </div>
      
      
     <!-- FOOTER -->
     <footer class="grid">
        <!-- Footer - top -->
        <!-- Image-->
        <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url(img/img-04.jpg)"></div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase ">Who We Are?</h2>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

