<?php
// Start the session
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);

// If the user is not logged in, redirect to the login page
// if (!$loggedIn) {
    // header("Location: auth.php");
    // exit;
// }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AYU-SYNC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stock.css?v=1">
    <link rel="stylesheet" href="css/components.css?v=1">
    <link rel="stylesheet" href="css/icons.css?v=1">
    <link rel="stylesheet" href="css/responsee.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=1">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css?v=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <style>
        /* Your existing CSS styles here */
        .container {
    margin-left: auto;
    margin-right: auto;
    text-align: center; /* Optional: Center-align the content within the container */
}

        /* Media query for mobile screens */
        @media (max-width: 768px) {
            /* Adjust styles for smaller screens here */
            body {
                font-size: 14px; /* Example: Reduce font size */
            }
            #company_container {
                text-align: center; /* Center the container */
            }
            /* Add more responsive styles as needed */
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
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>
                    <li><a href="startup_directory.php">Stratup Directory</a></li>
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
    <!-- MAIN -->
<div class="container">
        <div class="row">
            <div class="new_con">
                <div id="loading_container">
                    <h6>Loading data.....</h6>
                    <progress></progress>
                </div>
                <div id="company_container" class="company_container">
                <select id="companies" class="custom-select mb-3" name="companies">
                    <option value="APOLLO HOSPITALS (APOLLOHOSP.BSE)">APOLLO HOSPITALS (APOLLOHOSP.BSE)</option>
                    <option value="DABUR (DABUR.BSE)">DABUR (DABUR.BSE)</option>
                    <option value="Himalaya (HFIL.BSE)">Himalaya (HFIL.BSE)</option>
                    <option value="Patanjali (PATANJALI.BSE)">Patanjali (PATANJALI.BSE)</option>
                    <option value="EMAMI (EMAMILTD.BSE)">EMAMI (EMAMILTD.BSE)</option>
                    <option value="CAPLIN POINT LABORATORIES (CAPPL.BSE)">CAPLIN POINT LABORATORIES (CAPPL.BSE)</option>
                    <option value="Oriental Aromatics (OAL.BSE)">Oriental Aromatics (OAL.BSE)</option>
                    <option value="KERALA AYURVEDA (KERALAYUR.BSE)">KERALA AYURVEDA (KERALAYUR.BSE)</option>
                    <option value="Ozone World (OZONEWORLD.BSE)">Ozone World (OZONEWORLD.BSE)</option>
                    <option value="NATCO PHARMA (NATCOPHARM.BSE)">NATCO PHARMA (NATCOPHARM.BSE)</option>
                    <option value="ARIHANT FOUNDATIONS & HOUSING (ARIHANT.BSE)">ARIHANT FOUNDATIONS & HOUSING (ARIHANT.BSE)</option>                    </select>
                    <button id="get_data" onclick="getData()" class="btn btn-primary mt-3 mt-sm-0">Get Data</button>
                </div>
            </div>
            <div class="col-12">
                <button id="download_data" onclick="download()" class="btn btn-success" style="margin-left:auto;margin-left:auto;">Download Data(CSV)</button>
                <div id="chartContainer"></div>
                <div id="table_container"></div>
            </div>
        </div>
    </div>
</body>
<!-- FOOTER -->
<footer class="grid">
    <!-- Footer - top -->
    <!-- Image-->
    <div class="s-12 l-3 m-row-3 margin-bottom background-image"
        style="background-image:url(img/img-04.jpg)"></div>

    <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
        <h2 class="text-strong text-uppercase">Who We Are?</h2>
        <p>The Ministry of Ayush, established in November 2014, aims to promote ancient healthcare systems. It evolved
            from the Department of ISM&H in 1995, later focusing on Ayurveda, Yoga, Naturopathy, Unani, Siddha, and
            Homoeopathy.</p>
    </div>

    <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
        <h2 class="text-strong text-uppercase">Contact Us</h2>
        <p><b class="text-primary margin-right-10">P</b> 1800-11-22-02 (9:00 AM to 5:30 PM) (IST)</p>
        <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover"
                href="mailto:contact@sampledomain.com">contact@sampledomain.com</a></p>
        <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover"
                href="mailto:office@sampledomain.com">office@sampledomain.com</a></p>
    </div>

    <!-- Footer - bottom -->
    <div class="s-12 text-center margin-bottom">
    <p class="text-size-12">Copyright 2023</p>
        <p class="text-size-12">All Rights Reserved</p>

        <p><a class="text-size-12 text-primary-hover"
                href="http://www.myresponsee.com"
                title="Responsee - lightweight responsive framework">Design and coding by Team THE BOYS</a></p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="stock.js?v=1"></script>
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