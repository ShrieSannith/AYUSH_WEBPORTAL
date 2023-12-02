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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <style>
    /* Main Content Styles */
    main {
        padding: 20px;
        background: blur;
    }

    /* Section Styles */
    section {
        background: #fff; /* Set a white background for sections */
        border-radius: 10px; /* Add rounded corners to sections */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add a more pronounced box shadow */
        margin: 10px 0; /* Add space between sections */
        padding: 10px; /* Add internal spacing within sections */
    }

    /* Text Styles */
    h1, h2, h3 {
        color: #333; /* Set text color to a dark gray */
    }

    p {
        color: #666; /* Set paragraph text color to a slightly lighter gray */
    }

    /* Button Styles */
    .button {
        display: inline-block;
        padding: 10px 20px;
        background: #ff5733; /* Set button background color */
        color: #fff; /* Set button text color to white */
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s, transform 0.2s;
    }

    .button:hover {
        background: #e5482d; /* Change button color on hover */
        transform: scale(1.05); /* Enlarge button on hover */
    }

    /* Card Styles */
    .box {
        padding: 20px; /* Add spacing inside boxes */
        border: 1px solid #ddd; /* Add a subtle border to boxes */
        border-radius: 10px;
        background: #f7f7f7; /* Light gray background for boxes */
        transition: box-shadow 0.3s;
    }

    .box:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Enhance box shadow on hover */
    }
</style>
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
.background-dark h1, .background-dark h2, .background-dark h3, .background-dark h4, .background-dark h5, .background-dark h6, .background-dark .h1, .background-dark .h2, .background-dark .h3, .background-dark .h4, .background-dark .h5, .background-dark .h6, .primary-color-dark .background-primary h1, .primary-color-dark .background-primary h2, .primary-color-dark .background-primary h3, .primary-color-dark .background-primary h4, .primary-color-dark .background-primary h5, .primary-color-dark .background-primary h6, .primary-color-dark .background-primary .h1, .primary-color-dark .background-primary .h2, .primary-color-dark .background-primary .h3, .primary-color-dark .background-primary .h4, .primary-color-dark .background-primary .h5, .primary-color-dark .background-primary .h6, .background-orange h1, .background-orange h2, .background-orange h3, .background-orange h4, .background-orange h5, .background-orange h6, .background-orange .h1, .background-orange .h2, .background-orange .h3, .background-orange .h4, .background-orange .h5, .background-orange .h6, .primary-color-orange .background-primary h1, .primary-color-orange .background-primary h2, .primary-color-orange .background-primary h3, .primary-color-orange .background-primary h4, .primary-color-orange .background-primary h5, .primary-color-orange .background-primary h6, .primary-color-orange .background-primary .h1, .primary-color-orange .background-primary .h2, .primary-color-orange .background-primary .h3, .primary-color-orange .background-primary .h4, .primary-color-orange .background-primary .h5, .primary-color-orange .background-primary .h6, .background-red h1, .background-red h2, .background-red h3, .background-red h4, .background-red h5, .background-red h6, .background-red .h1, .background-red .h2, .background-red .h3, .background-red .h4, .background-red .h5, .background-red .h6, .primary-color-red .background-primary h1, .primary-color-red .background-primary h2, .primary-color-red .background-primary h3, .primary-color-red .background-primary h4, .primary-color-red .background-primary h5, .primary-color-red .background-primary h6, .primary-color-red .background-primary .h1, .primary-color-red .background-primary .h2, .primary-color-red .background-primary .h3, .primary-color-red .background-primary .h4, .primary-color-red .background-primary .h5, .primary-color-red .background-primary .h6, .background-blue h1, .background-blue h2, .background-blue h3, .background-blue h4, .background-blue h5, .background-blue h6, .background-blue .h1, .background-blue .h2, .background-blue .h3, .background-blue .h4, .background-blue .h5, .background-blue .h6, .primary-color-blue .background-primary h1, .primary-color-blue .background-primary h2, .primary-color-blue .background-primary h3, .primary-color-blue .background-primary h4, .primary-color-blue .background-primary h5, .primary-color-blue .background-primary h6, .primary-color-blue .background-primary .h1, .primary-color-blue .background-primary .h2, .primary-color-blue .background-primary .h3, .primary-color-blue .background-primary .h4, .primary-color-blue .background-primary .h5, .primary-color-blue .background-primary .h6, .background-aqua h1, .background-aqua h2, .background-aqua h3, .background-aqua h4, .background-aqua h5, .background-aqua h6, .background-aqua .h1, .background-aqua .h2, .background-aqua .h3, .background-aqua .h4, .background-aqua .h5, .background-aqua .h6, .primary-color-aqua .background-primary h1, .primary-color-aqua .background-primary h2, .primary-color-aqua .background-primary h3, .primary-color-aqua .background-primary h4, .primary-color-aqua .background-primary h5, .primary-color-aqua .background-primary h6, .primary-color-aqua .background-primary .h1, .primary-color-aqua .background-primary .h2, .primary-color-aqua .background-primary .h3, .primary-color-aqua .background-primary .h4, .primary-color-aqua .background-primary .h5, .primary-color-aqua .background-primary .h6 {
    color: #182026;
}
.text-white, .text-white *, .primary-color-white .text-primary, .primary-color-white .text-primary * {
    color: #182026 !important;
}

    </style>
</head>

<body class="size-1520 primary-color-red background-dark">
    <header class="grid">
        <!-- Top Navigation -->
        <nav class="s-12 grid background-none background-primary-hightlight" style="background-color: aliceblue;">
        <?php if ($loggedIn) : ?>
    <a href="welcome.php" class="m-12 l-3 padding-2x logo">
<?php else : ?>
    <a href="index.php" class="m-12 l-3 padding-2x logo">
<?php endif; ?> 
                <div style="display: inline-flex;">
                    <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg">
                    <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg">
                    <h1 style="margin-left: 10px; margin-top: -10px; font-weight: 700; font-size: 40px; color:white!important;">AYUSH</h1>
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

    <main role="main">
        <!-- TOP SECTION -->
        <section class="grid margin-bottom">
            <div class="m-12 l-6">
                <img src="img\new.jpg" alt="Schemes Image">
            </div>
            <div class="m-12 l-6">
                <div class="box">
                <h1 class="text-white text-strong" style="color: #ff5733;">Welcome to AYU-SYNC Schemes</h1>
                    <p class="text-white">Explore our healthcare schemes below.</p>
                    <a class="button s-12 text-white background-primary" href="#">View Schemes</a>
                </div>
            </div>
        </section>

<!-- SCHEMES SECTION -->
<section class="grid margin">
    <!-- Scheme 1 -->
    <div class="m-12 l-4">
        <div class="box scheme-box">
        <h3 class="text-white text-strong" style="color: #33ff57;">Scheme 1</h3>
            <p class="text-white">
                This is the first healthcare scheme offered by AYU-SYNC. It provides comprehensive coverage for a variety of medical services and treatments. Whether you need routine check-ups or specialized care, Scheme 1 has you covered.
            </p>
            <a class="button s-12 text-white background-primary" href="#">Learn More</a>
        </div>
    </div>
    <!-- Scheme 2 -->
    <div class="m-12 l-4">
        <div class="box scheme-box">
        <h3 class="text-white text-strong" style="color: #ff5733;">Scheme 2</h3>
            <p class="text-white">
                Introducing Scheme 2, your gateway to advanced healthcare solutions. With Scheme 2, you gain access to a network of top-tier medical professionals and cutting-edge treatments. Stay healthy and secure with Scheme 2.
            </p>
            <a class="button s-12 text-white background-primary" href="#">Learn More</a>
        </div>
    </div>
    <!-- Scheme 3 -->
    <div class="m-12 l-4">
        <div class="box scheme-box">
        <h3 class="text-white text-strong" style="color: #33ff57;">Scheme 3</h3>
            <p class="text-white">
                Scheme 3 is designed for those seeking specialized care. Whether it's chronic illness management or specific treatments, Scheme 3 tailors its services to your unique health needs. Explore the possibilities with Scheme 3.
            </p>
            <a class="button s-12 text-white background-primary" href="#">Learn More</a>
        </div>
    </div>
</section>

<br>
<!-- AYUSH INITIATIVES SECTION -->
<section class="grid margin">
    <!-- Point 1 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>National Ayush Mission (NAM)</h3>
            <p>
                NAM is a centrally sponsored scheme launched by the Ministry of Ayush. It aims to promote Ayush healthcare services, strengthen educational institutions, and support Ayush drug manufacturing units.
            </p>
        </div>
    </div>
    <!-- Point 2 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Ayushman Bharat - Pradhan Mantri Jan Arogya Yojana (PM-JAY)</h3>
            <p>
                Under the Ayushman Bharat program, Ayush healthcare services are integrated into the National Health Protection Scheme (NHPS). Ayush hospitals and practitioners can provide services to beneficiaries covered under PM-JAY.
            </p>
        </div>
    </div>
    <!-- Point 3 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Legal Framework for Ayush</h3>
            <p>
                The Indian government has established legal frameworks to regulate Ayush systems. The main laws include:
            </p>
            <ul>
                <li>The Drugs and Cosmetics Act, 1940: Governs the manufacturing, sale, and distribution of Ayush medicines.</li>
                <li>The Indian Medicine Central Council Act, 1970: Provides for the constitution of a Central Council of Indian Medicine to regulate education and practice.</li>
                <li>The Homoeopathy Central Council Act, 1973: Regulates homoeopathy education and practice.</li>
            </ul>
        </div>
    </div>
    <!-- Point 4 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Ayush Research and Development</h3>
            <p>
                The Ministry of Ayush supports research and development in Ayush through various initiatives, including:
            </p>
            <ul>
                <li>Setting up research councils and institutions.</li>
                <li>Funding research projects in Ayush.</li>
                <li>Promoting traditional knowledge systems and documentation.</li>
            </ul>
        </div>
    </div>
    <!-- Point 5 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Pharmacopoeial Standards</h3>
            <p>
                Pharmacopoeial standards are established for Ayush medicines to ensure quality and safety. The Ayurvedic Pharmacopoeia of India, Siddha Pharmacopoeia of India, and Homoeopathic Pharmacopoeia of India are some examples.
            </p>
        </div>
    </div>
    <!-- Point 6 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Ayush Educational Institutions</h3>
            <p>
                India has numerous Ayush educational institutions and universities that offer degree and diploma programs in Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homoeopathy.
            </p>
        </div>
    </div>
    <!-- Point 7 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Ayush in Healthcare Delivery</h3>
            <p>
                Ayush systems are integrated into healthcare delivery at various levels. Ayush practitioners work in hospitals and clinics alongside modern medical practitioners.
            </p>
        </div>
    </div>
    <!-- Point 8 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>International Cooperation</h3>
            <p>
                The Ministry of Ayush promotes international cooperation in the field of Ayush. It collaborates with other countries to promote traditional Indian systems of medicine and wellness.
            </p>
        </div>
    </div>
    <!-- Point 9 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Quality Control and Certification</h3>
            <p>
                Ayush products are subject to quality control and certification processes. The ministry supports the certification of Ayush products through agencies like the National Medicinal Plants Board.
            </p>
        </div>
    </div>
    <!-- Point 10 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Medicinal Plants Conservation and Cultivation</h3>
            <p>
                Initiatives are undertaken to conserve and promote the cultivation of medicinal plants used in Ayush systems.
            </p>
        </div>
    </div>
    <!-- Point 11 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Public Awareness and Promotion</h3>
            <p>
                The government conducts awareness campaigns and promotional activities to educate the public about the benefits of Ayush systems.
            </p>
        </div>
    </div>
    <!-- Point 12 -->
    <div class="m-12 l-6">
        <div class="box">
            <h3>Ayush in Public Health Programs</h3>
            <p>
                Ayush systems are integrated into public health programs such as immunization, maternal and child health, and prevention of non-communicable diseases.
            </p>
        </div>
    </div>
</section>
<br>
<!-- MEDICAL SERVICES AND TREATMENTS COVERAGE SECTION -->
<section class="grid margin">
    <div class="m-12 l-6">
        <div class="box">
            <h3>Comprehensive Coverage</h3>
            <p>
                Our healthcare plans offer comprehensive coverage for a wide range of medical services and treatments, ensuring that you and your family receive the care you need.
            </p>
        </div>
    </div>
    <div class="m-12 l-6">
        <div class="box">
            <h3>Medical Specialties</h3>
            <p>
                We cover various medical specialties, including cardiology, dermatology, pediatrics, orthopedics, and more. You can access expert care in any field.
            </p>
        </div>
    </div>
    <div class="m-12 l-6">
        <div class="box">
            <h3>Diagnostic Services</h3>
            <p>
                Our plans include coverage for essential diagnostic services such as blood tests, imaging, and screenings, ensuring timely and accurate diagnoses.
            </p>
        </div>
    </div>
    <div class="m-12 l-6">
        <div class="box">
            <h3>Treatment Options</h3>
            <p>
                From medications to surgical procedures, we provide coverage for various treatment options, tailored to your specific healthcare needs.
            </p>
        </div>
    </div>
    <div class="m-12 l-6">
        <div class="box">
            <h3>Therapies and Rehabilitation</h3>
            <p>
                We support therapies and rehabilitation services to aid in your recovery, including physical therapy, occupational therapy, and more.
            </p>
        </div>
    </div>
    <div class="m-12 l-6">
        <div class="box">
            <h3>Preventive Care</h3>
            <p>
                Our plans emphasize preventive care, covering vaccinations, wellness check-ups, and health screenings to keep you healthy and proactive.
            </p>
        </div>
    </div>
</section>

    </main>

    <footer class="grid">
        <!-- Footer - top -->
        <!-- Image-->
        <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url(img/img-04.jpg)"></div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
        <h2 class="text-strong text-uppercase" style="color: white;">Who We Are?</h2>
           <p>The Ministry of Ayush, established in November 2014, aims to promote ancient healthcare systems. It evolved from the Department of ISM&H in 1995, later focusing on Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homoeopathy.</p>
        </div>
                
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase" style="color: white;">Contact Us</h2>
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
