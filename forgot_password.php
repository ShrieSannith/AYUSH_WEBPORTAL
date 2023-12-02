<!DOCTYPE html>
<?php
require_once("connection.php");

if (isset($_SESSION["login_sess"])) {
    header("location: account.php");
}
?>
<html>

<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="forgot_process.php" method="POST">
                    <!-- <div class="text-center">
                        <img src="your-logo.png" class="img-fluid logo" alt="Your Logo">
                    </div> -->
                    <?php
                    if (isset($_GET['err'])) {
                        $err = $_GET['err'];
                        echo '<div class="alert alert-danger" role="alert">No user found.</div>';
                    }
                    // If server error 
                    if (isset($_GET['servererr'])) {
                        echo '<div class="alert alert-danger" role="alert">The server failed to send the message. Please try again later.</div>';
                    }
                    // if other issues 
                    if (isset($_GET['somethingwrong'])) {
                        echo '<div class="alert alert-danger" role="alert">Something went wrong.</div>';
                    }
                    // If Success | Link sent 
                    if (isset($_GET['sent'])) {
                        echo '<div class="alert alert-success" role="alert">Reset link has been sent to your registered email id. Kindly check your email. It can take 2 to 3 minutes to deliver to your email id.</div>';
                    }
                    ?>
                    <?php if (!isset($_GET['sent'])) { ?>
                        <div class="form-group">
                            <label class="label_txt">Username or Email</label>
                            <input type="text" name="login_var" value="<?php if (!empty($err)) {
                                                                            echo $err;
                                                                        } ?>" class="form-control" required>
                        </div>
                        <button type="submit" name="subforgot" class="btn btn-primary",>Send Link</button>
                    <?php } ?>
                </form>
                <div class="mt-3 text-center">
                    <p>Have an account? <a href="auth.php">Login</a></p>
                    <p>Don't have an account? <a href="auth.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
