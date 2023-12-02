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
      <link rel="stylesheet" href="startup.css?v=1">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
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
              <?php if ($loggedIn) : ?>
                <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>
                    <li><a href="startup_directory.php">Stratup Directory</a></li>
                    <li><a href="jobs.php">Jobs</a></li>
                <li><a href="job_registration.php">Give a Job Ad</a></li>
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
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">JOB LISTINGS</h1>
            <p class="text-size-20 text-white text-center center">Explore job opportunities in Ayurveda, Yoga, Naturopathy, and more. Post your job listings here.</p>
          </div>
        </header>
      
        <section class="grid margin">
    <?php
       // Include the database configuration
       include('connection.php');

       if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])) {
           // Process job application form submission here
           // You can access job details from $_POST['company'], $_POST['job_title'], etc.
           // Perform the necessary actions (e.g., insert data into a job application table)
           // Redirect to a thank you page or display a success message
       }

       // Fetch job listings data from the database
       $query = "SELECT * FROM jobs";
       $result = mysqli_query($conn, $query);
       
       if ($result && mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class='s-12 m-6 margin-bottom'>";
               echo "<div class='startup-card'>";
               echo "<div class='startup-content'>";
               echo "<h2 class='startup-title'>{$row['job_title']}</h2>";
               echo "<p class='startup-funding'>Company: {$row['company']}</p>";
               echo "<p class='startup-description'>Location: {$row['location']}</p>";
               echo "<p class='startup-description'>Salary: {$row['salary']}</p>";
               echo "<p class='startup-description'>Requirements: {$row['requirements']}</p>";
               echo "<p class='startup-description'>Number Required: {$row['Number_Required']}</p>"; // Display Number_Required
               echo "<p class='startup-contact'>Description: {$row['job_description']}</p>";
               
               // Add an "Apply" button that opens the job application form
               $jobID = $row['job_id']; // Retrieve the job_id from the database
               echo "<form method='POST' action='job_application.php'>";
               echo "<input type='hidden' name='company' value='{$row['company']}'>";
               echo "<input type='hidden' name='job_title' value='{$row['job_title']}'>";
               echo "<a href='job_application.php?job_id=$jobID' class='startup-button'>Apply</a>";
               echo "</form>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
           }
       } else {
           echo "<p class='no-startups'>No job listings found.</p>";
       }

       // Close the database connection
       mysqli_close($conn);
       ?>
 </section>
        
      </main>
      
       
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

   </body>
</html>
