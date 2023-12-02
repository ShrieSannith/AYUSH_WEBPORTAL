<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);
// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startupName = $_POST["startup_name"];
    $fundingAmount = $_POST["funding_amount"];
    $description = $_POST["description"];
    $website = $_POST["website"];
    $phoneNumber = $_POST["phone_number"];

    // Prepare the SQL statement
    $sql = "INSERT INTO Registered_Startups (Startup_Name, Funding_Amount, Description, Website, Phone_Number)
            VALUES ('$startupName', '$fundingAmount', '$description', '$website', '$phoneNumber')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Startup registered successfully!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
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
    <link rel="stylesheet" href="startup.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    <style>
        /* Center the form */
        .form-signin {
            background-color: black;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
            max-width: 600px; /* Increased maximum width for a bigger form */
            width: 100%;
            margin: 0 auto; /* Center the form horizontally */
            margin-top: 50px; /* Add top margin for spacing */
        }

        .form-signin h1 {
            font-weight: bold;
            font-size: 30px;
        }

        /* Style the form input fields */
        .form-control {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            font-size: 16px;
        }

        /* Style the form submit button */
        .btn-primary {
            background-color: #ff5733; /* Change the button color */
            border: none;
            border-radius: 5px;
            padding: 15px;
            font-size: 18px;
            color: #fff; /* Change text color to white */
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #e74c3c; /* Change button color on hover */
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
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="startup_directory.php">Stratup Directory</a></li>
                <li><a href="startup.php">Registered Startups</a></li>
                <li><a href="register_startup.php">Register Your Startup</a></li>
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

      <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-16">
            <main class="form-signin text-center">
                <form action="register_startup.php" method="POST">
                    <h1 class="h3 mb-3 fw-normal">REGISTER AS STARTUP</h1>
                    <p style="color: white; margin-bottom: 20px;">Register so others will come to know about your startup. View Registered Startups by navigating to it.</p>
                    <!-- Add the PHP code to display the success message here -->
                    <?php if (!empty($successMessage)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="startupName" name="startup_name" placeholder=" ">
                        <label for="startupName">Startup Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fundingAmount" name="funding_amount" placeholder=" ">
                        <label for="fundingAmount">Funding Amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder=" "></textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="website" name="website" placeholder=" ">
                        <label for="website">Website</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder=" ">
                        <label for="phoneNumber">Phone Number</label>
                    </div>

                    <button class="btn btn-primary w-30 py-2" type="submit">Register</button>
                </form>
            </main>
        </div>
    </div>
</div>

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


<?php
// Display success or error message
if (!empty($successMessage)) {
    echo "<div class='alert alert-success' role='alert'>$successMessage</div>";
} elseif (!empty($errorMessage)) {
    echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
}
?>