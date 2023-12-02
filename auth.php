<?php
// Include the database connection
include_once('connection.php'); 

// Initialize error and success message variables
$error_message = "";
$success_message = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['signup-submit'])) {
        // Handle the signup form submission
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['role']; 

        // Validate and sanitize user input
        $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_STRING);
        $role = filter_var($role, FILTER_SANITIZE_STRING);

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format.";
        } else {
            // Check if the username is already taken
            $checkQuery = "SELECT User_Name FROM users WHERE User_Name = ?";
            $checkStmt = mysqli_prepare($conn, $checkQuery);
            mysqli_stmt_bind_param($checkStmt, "s", $user_name);
            mysqli_stmt_execute($checkStmt);
            $checkResult = mysqli_stmt_get_result($checkStmt);

            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                // Username already taken, display an error message
                $error_message = "Username already taken, please choose another one.";
            } else {
                // Hash the password securely
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Save to the database using prepared statement
                $query = "INSERT INTO users (User_Name, Email, Phone_Number, Password, Role) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "sssss", $user_name, $email, $phone_number, $hashedPassword, $role);

                if (mysqli_stmt_execute($stmt)) {
                    // Registration successful, display success message
                    $success_message = "Successfully signed up!";
                } else {
                    $error_message = "Error signing up. Please try again.";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            }
        }} elseif (isset($_POST['login-submit'])) {
        // Handle the login form submission
        $login_username = $_POST['login-username'];
        $login_password = $_POST['login-password'];

        // Verify user credentials in the database
        $query = "SELECT U_ID, User_Name, Password FROM users WHERE User_Name = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $login_username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row && password_verify($login_password, $row['Password'])) {
                // Login successful
                session_start();
                $_SESSION['U_ID'] = $row['U_ID']; // Set the U_ID session variable
                // After successful login
                $_SESSION['User_Name'] = $login_username; // Assuming $username is the user's name from the database

                header("Location: welcome.php");
                exit;
            } else {
                $error_message = "Incorrect username or password. Please try again.";
            }
        } else {
            $error_message = "Error occurred while trying to log in. Please try again later.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?v=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <title>Sign in & Sign up Form</title>
    <style>
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem
rem
;
}
</style>
</head>
<body>
      <!-- HEADER -->
   
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign-in Form -->
                <form action="#" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($success_message)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="login-username" name="login-username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="login-password" name="login-password" placeholder="Password" required />
                        <div class="eye-icon" id="show-password">👁</div>
                    </div>
                    <div class="password-forgot">
                        <a href="forgot_password.php">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login" name="login-submit" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <!-- Sign-up Form -->
                <form action="#" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <?php if (!empty($success_message)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="role" name="role" placeholder="Role (e.g., Public User, Investors, Incubators)" required />
                    </div>
                    <input type="submit" value="Sign up" name="signup-submit" class="btn" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Where Dreams Become Reality - Sign Up for the Epic Saga</p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/A.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Enter the Realm of Infinite Possibilities - Sign In and Unleash</p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/image 1.png" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="app.js"></script>
    <script src="signup.js"></script>
</body>
</html>