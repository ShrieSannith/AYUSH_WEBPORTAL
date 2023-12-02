<?php
// Include your database connection file here
include("connection.php");

// Start the session (if not already started)
session_start();
$loggedIn = isset($_SESSION['U_ID']);

// Check if the user is logged in
if (!isset($_SESSION['U_ID'])) {
    header("Location: auth.php"); // Redirect to the login page if the user is not logged in
    exit();
}
// Initialize edit mode to false
$editMode = false;

$passwordChangeSuccess = isset($_SESSION['passwordChangeSuccess']) ? $_SESSION['passwordChangeSuccess'] : '';
$updateSuccess = isset($_SESSION['updateSuccess']) ? $_SESSION['updateSuccess'] : '';

// Clear the success messages from session to avoid displaying them again
unset($_SESSION['passwordChangeSuccess']);
unset($_SESSION['updateSuccess']);

// ... (rest of your code)

// Function to toggle edit mode for user details
function toggleEditMode() {
    global $editMode;
    $editMode = !$editMode;
}
// Fetch user information from the database based on the logged-in user's username
$userId = $_SESSION['U_ID'];
$query = "SELECT User_Name, Email, Phone_Number, Role, Password FROM users WHERE U_ID = '$userId'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed.");
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['User_Name'];
    $email = $row['Email'];
    $phoneNumber = $row['Phone_Number'];
    $role = $row['Role'];
    $hashedOldPassword = $row['Password']; // Retrieve hashed password from the database
} else {
    die("User not found.");
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_details"])) {
    // Process the form data for updating user details
    $newUsername = mysqli_real_escape_string($conn, $_POST["new_user_name"]);
    $newEmail = mysqli_real_escape_string($conn, $_POST["new_email"]);
    $newPhoneNumber = mysqli_real_escape_string($conn, $_POST["new_phone_number"]);
    $newRole = mysqli_real_escape_string($conn, $_POST["new_role"]);

    // Update the database with the new information
    $updateQuery = "UPDATE users SET User_Name='$newUsername', Email = '$newEmail', Phone_Number = '$newPhoneNumber', Role = '$newRole' WHERE U_ID = '$userId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Update successful
        $_SESSION['updateSuccess'] = "User details updated successfully.";
        header("Location: profile.php");
        exit();
    } else {
        die("Update failed: " . mysqli_error($conn));
    }    
}


// Handle form submissions for changing the password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_password"])) {
    // Get the entered old password and new password
    $enteredOldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];

    // Validate the old password by comparing it with the stored hashed password
    if (password_verify($enteredOldPassword, $hashedOldPassword)) {
        // Old password is correct, proceed to change the password
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updatePasswordQuery = "UPDATE users SET Password = '$hashedNewPassword' WHERE U_ID = '$userId'";
        $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);

        if ($updatePasswordResult) {
            // Password changed successfully
            $_SESSION['passwordChangeSuccess'] = "Password changed successfully.";
            header("Location: profile.php?password_changed=1");
            exit();
        } else {
            die("Password update failed: " . mysqli_error($conn));
        }
        
    } else {
        // Old password is incorrect, display an error message
        $passwordChangeError = "Incorrect old password. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $userName ?>'s Profile-AYU-SYNC</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="css/profile.css?v=1">
    <script src="js/profile.js"></script>
    <link rel="stylesheet" href="css/components.css?v=1">
    <link rel="stylesheet" href="css/icons.css?v=1">
    <link rel="stylesheet" href="css/responsee.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v=1">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css?v=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
    <script>
    let editMode = false; // Variable to track edit mode

    // Function to toggle edit mode for user details
    function toggleEditMode() {
        editMode = !editMode; // Toggle the edit mode variable

        // Get all elements with the class "user-detail"
        const userDetailElements = document.querySelectorAll('.user-detail');

        // Loop through the user detail elements
        userDetailElements.forEach((element) => {
            // Set the contentEditable attribute to enable or disable editing
            element.contentEditable = editMode;

            // Add or remove a CSS class to change the appearance (optional)
            if (editMode) {
                element.classList.add('editable');
            } else {
                element.classList.remove('editable');
            }
        });
    }
    </script>

        <style>
        /* Style the centering container */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Style the profile container */
        .profile-container {
            background-color: black;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
            max-width: 600px; /* Increased maximum width for a bigger form */
            width: 100%;
            /* Removed margin and margin-top */
        }

        .profile-container h2 {
            font-weight: bold;
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
            margin-bottom: 10px; /* Add spacing between button and h3 */
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #e74c3c; /* Change button color on hover */
        }
        
    </style>
</head>
    <body class="size-1520 primary-color-red background-dark">
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
              <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg" alt="Logo"></img>
              <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg" alt="G20"></img>
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
                    <?php endif; ?>                           </ul>
           </div>
        </nav>
    </header>
    <div class="center-container">
    <div class="profile-container">
        <h2>User Profile</h2>
        <?php if (!empty($updateSuccess)) : ?>
        <div class="alert alert-success" role="alert"><?php echo $updateSuccess; ?></div>
    <?php endif; ?>
            <form method="post" action="profile.php">
            <div class="form-floating mb-3">
                <input type="text" class="form-control user-detail" id="userName" name="new_user_name" placeholder="User Name" value="<?php echo $userName; ?>" <?php echo $editMode ? 'readonly' : ''; ?>>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control user-detail" id="email" name="new_email" placeholder="Email" value="<?php echo $email; ?>" <?php echo $editMode ? 'readonly' : ''; ?>>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control user-detail" id="phoneNumber" name="new_phone_number" placeholder="Phone Number" value="<?php echo $phoneNumber; ?>" <?php echo $editMode ? 'readonly' : ''; ?>>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control user-detail" id="role" name="new_role" placeholder="Role" value="<?php echo $role; ?>" <?php echo $editMode ? 'readonly' : ''; ?>>
            </div>

            <!-- Button to toggle edit mode for user details -->
            <!-- <button class="btn btn-primary w-20 py-2" type="button" onclick="toggleEditMode()" <?php echo $editMode ? '' : 'disabled'; ?>>Edit Details</button> -->
            <button class="btn btn-primary w-20 py-2" type="submit" name="update_details" <?php echo $editMode ? 'disabled' : ''; ?>>Save Changes</button>
        </form>
        <!-- Form to change password -->
        <div class="change-password-form">
            <h2>Change Password</h2>
            <?php if (!empty($passwordChangeSuccess)) : ?>
        <div class="alert alert-success" role="alert"><?php echo $passwordChangeSuccess; ?></div>
    <?php endif; ?>
            <form method="post" action="profile.php">
                <label for="old_password">Old Password:</label>
                <input type="password" class="form-control" id="old_password" name="old_password" required>
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <button type="submit" class="btn btn-primary w-20 py-2" name="change_password">Change Password</button>
            </form>
        </div>
    </div>
</div>

    <footer class="s-12 text-center margin-bottom">
    <p class="text-size-12">Copyright 2023</p>
        <p class="text-size-12">All Rights Reserved</p>
        <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Team THE BOYS</a></p>
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
