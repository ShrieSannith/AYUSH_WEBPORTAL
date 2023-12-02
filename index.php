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
    <link rel="stylesheet" href="css/components.css?v=1">
    <link rel="stylesheet" href="css/icons.css?v=1">
    <link rel="stylesheet" href="css/responsee.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
   
    <link rel="stylesheet" href="css/style.css?v=1">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css?v=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
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
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="schemes.php">Schemes</a></li>
                <li><a href="clinic.php">Clinics</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="auth.php">Login</a></li>
              </ul>
           </div>
        </nav>
      </header>
      <!-- MAIN -->
      <main role="main">
        <!-- TOP SECTION -->
        <section class="grid">
          <!-- Main Carousel -->
          <div class="s-12 margin-bottom carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-hide-arrows background-dark">
          	<div class="item background-image" style="background-image:url(img/c01.jpeg)">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Ayurvedha</p>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Ancient Indian holistic health system.</p>
            </div>
          	<div class="item background-image" style="background-image:url(img/c2.jpg)">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Yoga</p>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Ancient practice for physical and mental well-being.</p>
            </div>
            <div class="item background-image" style="background-image:url(img/c3.jpg)">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Unani</p>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Traditional Arabic medicine system.</p>
            </div>
            <div class="item background-image" style="background-image:url(img/c4.jpg)">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Siddha</p>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Ancient South Indian healing tradition.</p>
            </div>
            <div class="item background-image" style="background-image:url(img/c5.jpg)">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Homeopathy </p>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Alternative medicine using diluted substances.</p>
            </div>
          </div>  
        </section>
        
        <!-- SECTION 1 --> 
        <section class="grid margin text-center">
          <a href="startup_directory.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-red">
            <i class="icon-sli-rocket text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Startup Portal</h3>
          </a>
          <a href="incubators.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">
            <i class="icon-sli-diamond text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Incubators and accelerators</h3>
          </a>
          
          <!-- Image-->
          <img class="m-12 l-6 l-row-2 margin-bottom" src="img/ayush2.png">
          
          <a href="collab.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-orange">
            <i class="icon-sli-envelope-open text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Chat and Collaboration</h3>
          </a>
          <a href="stocks.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-aqua">
            <i class="icon-sli-graph text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">investor's Analytics</h3>
          </a>
        </section>
        
        <!-- SECTION 2 -->
        <section class="grid section margin-bottom background-dark">
        <div class="s-12 l-6 center">
        <h2 class="text-thin text-size-30 text-white text-uppercase margin-bottom-30">ABOUT <b>AYUSH PORTAL</b></h2>
        <p>Our portal serves as a unified platform catering to startups, investors, incubators, accelerators, government agencies, and the public. We meticulously analyze the unique requirements of each user group and seamlessly integrate them into a single interface. Whether you prefer to click on a specific tab or utilize our AI-powered assistance, we are here to ensure your needs are met efficiently and effectively.</p>
    </div>
    <div class="s-12 l-6 center">
    <img src="img/1.png" alt="About Ayush Image" class="image-right" width="50" height="50">
        <h2 class="text-thin text-size-30 text-white text-uppercase margin-bottom-30" style="text-align: center;">BEST <b>BLOG</b></h2>
        <div class="buttons-right">
            <a href="ayurveda.php" class="button"><b>A</b>yurveda</a>
            <a href="yoga.php" class="button"><b>Y</b>oga</a>
            <a href="unani.php" class="button"><b>U</b>nani</a>
            <a href="naturopathy.php" class="button"><b>S</b>iddha</a>
            <a href="homeopathy.php" class="button"><b>H</b>omeopathy</a>
        </div>
    </div>
        </section>
        
        <!-- SECTION 3 --> 
        <section class="grid margin">
          <!-- Image-->
          <img class="s-12 m-6 margin-bottom" src="img/ayushupdate.jpg">
        
          <div class="s-12 m-6 padding-2x margin-bottom background-blue">
            <h2 class="text-strong text-size-50 text-line-height-1">What's<br>New?</h2>
            <ul>
              <div style="height: 200px; overflow: auto;">
              <li>1. Comprehensive Revised Guidelines for Central Government Nomination(CGN) to MD (Ayurveda/Unani/Siddha and Homoeopathy) Courses for the session2023-24– regarding.
                शैक्षणिक सत्र 2023-24 के लिए एमडी (आयुर्वेद/यूनानी/सिद्ध एवं होम्योपैथी) पाठ्यक्रमों के लिए केंद्र सरकार नामांकन हेतु दिशानिर्देश के सम्बन्ध में ।
                Display upto:Dec 31, 2023</li>
              <a href="https://ayush.gov.in/images/whatsnew/CGN-PG-Guidlines_2023-24.pdf" target="_blank" class="icon-sli-docs text-size-20 text-white center margin-bottom-15"> Click to open PDF</a>

              <li>2. Preliminary Information Memorandum (PIM) And Global Invitation Of Expression Of Interest (EOI) For Proposed Strategic Disinvestment Of 100% Equity Shareholding Of Indian Medicines Pharmaceutical Corporation Limited (IMPCL) Held By Government Of India And Kumaon Mandal Vikas Nigam Limited (With Transfer Of Management Control).
                प्रारंभिक सूचना ज्ञापन (पीआईएम) "और" रुचि की अभिव्यक्ति का वैश्विक आमंत्रण (ईओआई) के लिए प्रस्तावित रणनीतिक विनिवेश का 100% इक्विटी शेयरहोल्डिंग का इंडियन मेडिसिन्स फार्मास्युटिकल कॉर्पोरेशन लिमिटेड (आईएमपीसीएल) द्वारा आयोजित भारत सरकार एवं कुमाऊँ मण्डल विकास निगम लिमिटेड (प्रबंधन नियंत्रण के हस्तांतरण के साथ)
                Display upto:Sep 30, 2023</li>
              <a href="https://ayush.gov.in/images/whatsnew/Final_PIM_EoI_of_IMPCL.pdf" target="_blank" class="icon-sli-docs text-size-20 text-white center margin-bottom-15"> Click to open PDF</a>
              <li>3. Seniority List of all the Ayush physicians working under Ministry of Ayush and CGHS as on 01.01.2023 - regarding.
                दिनांक ०१-०१-२०२३ की स्थिति के अनुसार आयुष मंत्रालय और सी जी एच एस के आधीन काम करने वाले सभी आयुष चिकित्सको की मसूदा वरिष्ठता सूचि के सम्बन्ध में |
                Display upto:Oct 9, 2023</li>
              <a href="https://ayush.gov.in/images/whatsnew/Seniority-list.pdf" target="_blank" class="icon-sli-docs text-size-20 text-white center margin-bottom-15"> Click to open PDF</a>
              <li>4. Promotion order of Chief Medical Officers/Deputy Advisers [Ayurveda/ Unani/ Homeopathy] in Ministry of Ayush.
                आयुष मंत्रालय में मुख्य चिकित्सा अधिकारियों/उप सलाहकारों (आयुर्वेद/यूनानी/होम्योपैथी) का पदोन्नति आदेश।
                Display upto:Sep 16, 2023</li>
              <a href="https://ayush.gov.in/images/whatsnew/Promotion-Order-Deputy-Adviser.pdf" target="_blank" class="icon-sli-docs text-size-20 text-white center margin-bottom-15"> Click to open PDF</a>
              <li>5. Guidelines for Central Nomination to Bachelor in Ayurvedic Medicine & Surgery (BAMS), Bachelor in Homoeopathi c Medicine & Surgery (BHMS), Bachelor in Unani Medicine & Surgery (BUMS),Bachelor in Siddha Medicine & Surgery (BSMS) and, Bachelor in Sowa-Rigpa Medicine & Surgery (BSRMS) Courses for the academic session 2023-24— reg.
                शैक्षणिक सत्र 2023-24 के लिए बैचलर इन आयुर्वेदिक मेडिसिन एंड सर्जरी (बीएएमएस), बैचलर इन यूनानी मेडिसिन एंड सर्जरी (बीयूएमएस), बैचलर इन सिद्ध मेडिसिन एंड सर्जरी (बीएसएमएस), बैचलर इन सोवा-रिग्‍पा मेडिसिन एंड सर्जरी (बीएसआरएमएस) और बैचलर इन होम्योपैथिक मेडिसिन एंड सर्जरी (बीएचएमएस) पाठ्यक्रमों के लिए केंद्रीय नामांकन हेतु दिशानिर्देशों के संबंध में।
                Display upto:Dec 31, 2023</li>
              <a href="https://ayush.gov.in/images/whatsnew/BAMS-Guideline.pdf" target="_blank" class="icon-sli-docs text-size-20 text-white center margin-bottom-15"> Click to open PDF</a>


              </div>
            </ul>
          </div>
        </section>
        
        <!-- SECTION 4 -->
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-40 center text-center">Our <b>Domains</b></h2>
        <section class="grid margin">
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/health.jpg" alt=""/>
            <h1>HEALTH</h1>
            <h3>Ministry of Ayush provides healthcare facility across the country by using six conventional treatment procedure.</h3>
          </a>	
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/edu.jpg" alt=""/>
            <h1>EDUCATION</h1>    
            <h3>The Ministry of Ayush regulates the educational standards of the Indian Systems of Medicine and Homoeopathy colleges in the country.</h3>
          </a>	
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/R&D.webp" alt=""/>
            <h1>Research And Development</h1>    
            <h3>The Ministry of Ayush has established Research Councils to promote research activities in Ayush System.</h3>
          </a>	
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/mp.jpg" alt=""/>
            <h1>Medicinal Plants</h1>    
            <h3>The Ministry of Ayush established Ntional Medicinal Plants Board(NMPB) an apex national body which coordinates all matters relating to medicinal plants in the country.
            </h3>
          </a>	
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/quality.webp" alt=""/>
            <h1>Quality & Standard</h1>  
            <h3>The Ministry of Ayush draws policies and regulations to evolve Pharmacopoeial standards of Indian Systems of Medicine and Homoeopathy drugs.</h3>  
          </a>	
          <a class="s-12 m-6 margin-bottom" href="">
            <img style="height: 500px; overflow: hidden;" class="full-img" src="img/partnership.webp" alt=""/>
            <h1>Partnership & Collaboration</h1> 
            <h3>Ministry of Ayush has collaborated with different institutions for the growth of traditional medicines.</h3>   
          </a>	
        </section>
        
        <!-- SECTION 5 -->
        <section class="grid margin text-center">
          <div class="m-12 l-4 padding-2x background-dark margin-bottom text-right">
            <h3 class="text-strong text-size-25 text-uppercase margin-bottom-10">Let's keep in touch</h3>
            <p>Your network is your net worth. Let's ensure our professional ties remain strong.</p>
          </div>
          <a href="https://www.facebook.com/moayush" class="s-12 m-6 l-2 padding vertical-center margin-bottom facebook hover-zoom">
             <i class="icon-sli-social-facebook text-size-60 text-white center"></i>
          </a>
          <a href="https://twitter.com/moayush" class="s-12 m-6 l-2 padding vertical-center margin-bottom twitter hover-zoom">
            <i class="icon-sli-social-twitter text-size-60 text-white center"></i>
          </a>
          <a href="https://www.youtube.com/@MinistryofAYUSHofficial/videos" class="s-12 m-6 l-2 padding vertical-center margin-bottom youtube hover-zoom">
            <i class="icon-sli-social-youtube text-size-60 text-white center"></i>
          </a>
          <a href="https://www.instagram.com/ministryofayush/" class="s-12 m-6 l-2 padding vertical-center margin-bottom instagram hover-zoom">
            <i class="icon-sli-social-instagram text-size-60 text-white center"></i>
          </a>
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