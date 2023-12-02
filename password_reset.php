<!DOCTYPE html>
<?php require_once("connection.php");
if(isset($_SESSION["login_sess"])) 
{
  header("location: welcome.php"); 
}
?>
<html>
<head>
<title>Password Reset - Techno Smarter</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
         <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        <?php
        if(isset($_GET['token']))
        {
          $token = $_GET['token'];
        }

        if(isset($_POST['sub_set'])){
            extract($_POST);
            $error = [];

            if($password == ''){
                $error[] = 'Please enter the password.';
            }
            if($passwordConfirm == ''){
                $error[] = 'Please confirm the password.';
            }
            if($password != $passwordConfirm){
                $error[] = 'Passwords do not match.';
            }
            if(strlen($password) < 5){
                $error[] = 'The password must be at least 6 characters long.';
            }
            if(strlen($password) > 50){
                $error[] = 'Password exceeds the maximum length of 50 characters.';
            }

            $fetchresultok = mysqli_query($conn, "SELECT email FROM pass_reset WHERE token='$token'");
            if($res = mysqli_fetch_array($fetchresultok)){
                $email = $res['email']; 
            }
            else { 
                $error[] = 'The link has expired or is invalid.';
            }

            if(empty($error)){
                $options = array("cost" => 4);
                $password = password_hash($password, PASSWORD_BCRYPT, $options);
                $resultresetpass = mysqli_query($conn, "UPDATE users SET Password='$password' WHERE Email='$email'"); 
                if($resultresetpass) {
                    $success = "<div class='successmsg'><span style='font-size:100px;'>&#9989;</span> <br> Your password has been updated successfully.. <br> <a href='login.php' style='color:#fff;'>Login here... </a> </div>";
                    $resultdel = mysqli_query($conn, "DELETE FROM pass_reset WHERE token='$token'");
                }
            } 
        }
        ?>
        <div class="login_form">
        <form action="" method="POST">
            <div class="form-group">
                <img src="https://technosmarter.com/assets/images/logo.png" alt="Techno Smarter" class="logo img-fluid"> 
                <?php 
                if(isset($error)){
                    foreach($error as $error){
                        echo '<div class="errmsg">'.$error.'</div><br>';
                    }
                }
                if(isset($success)){
                    echo $success;
                }
                ?>
                <?php if(!isset($hide)){ ?>
                <label class="label_txt">Password </label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="label_txt">Confirm Password </label>
                <input type="password" name="passwordConfirm" class="form-control" required>
            </div>
            <button type="submit" name="sub_set" class="btn btn-primary btn-group-lg form_btn">Reset Password</button>
            <?php } ?>
        </form>
        </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
