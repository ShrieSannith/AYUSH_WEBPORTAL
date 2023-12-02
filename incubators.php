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
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="startup.css?v=1">
    <!-- <link rel="stylesheet" href="incubators.css?v=1"> -->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>AYU-SYNC</title>
    <style>
    .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: black;
    border-bottom: 1px solid rgba(0,0,0,.125);
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    background-color: black;
    padding: 1.25rem;
}
.btn-link {
    font-weight: 400;
    color: #ffffff;
    text-decoration: none;
}

    </style>
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
                    <?php if ($loggedIn) : ?>
                        <li><a href="startup_directory.php">Stratup Directory</a></li>
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
   <header class="grid">
        	<div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-45 text-uppercase margin-bottom-20">Incubators & Accelerators</h1>
          </div>
        </header>
        <div class="container">
            <div class="accordion" id="accordionIncubators">
                <?php
                include('connection.php'); // Include your database connection code

                // Query the database to retrieve incubator profiles
                $query = "SELECT * FROM Incubators";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="card">';
                        echo '<div class="card-header" id="heading' . $counter . '">';
                        echo '<h2 class="mb-0">';
                        echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $counter . '" aria-expanded="true" aria-controls="collapse' . $counter . '">';
                        echo $row['Name'];
                        echo '</button>';
                        echo '</h2>';
                        echo '</div>';

                        echo '<div id="collapse' . $counter . '" class="collapse" aria-labelledby="heading' . $counter . '" data-parent="#accordionIncubators">';
                        echo '<div class="card-body">';
                        echo '<h5>Location:</h5>';
                        echo '<p>' . $row['Location'] . '</p>';
                        echo '<h5>Description:</h5>';
                        echo '<p>' . $row['Description'] . '</p>';
                        echo '<h5>Programs Offered:</h5>';
                        echo '<p>' . $row['Programs'] . '</p>';
                        echo '<h5>Success Stories:</h5>';
                        echo '<p>' . $row['SuccessStories'] . '</p>';
                        echo '<h5>Contact Information:</h5>';
                        echo '<p>' . $row['Location'] . '</p>';
                        echo '<h5>Website:</h5>';
                        echo '<p><a href="' . $row['Website'] . '">' . $row['Website'] . '</a></p>';
                        echo '<h5>Email:</h5>';
                        echo '<p>' . $row['Email'] . '</p>';
                        echo '<h5>Phone:</h5>';
                        echo '<p>' . $row['Phone'] . '</p>';                    
                        echo '</div>';
                        echo '</div>';

                        echo '</div>';
                        $counter++;
                    }
                } else {
                    echo '<p>No incubators found.</p>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
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
   <script src="https://mediafiles.botpress.cloud/c300e6db-bae7-4662-bfbf-24954df767c0/webchat/config.js" defer></script>   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
