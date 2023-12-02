<?php
require_once("connection.php");

if (isset($_POST['subforgot'])) {
    $login = $_POST['login_var'];

    // Check if the username or email exists in the database
    $query = "SELECT * FROM users WHERE (User_Name = '$login' OR Email = '$login')";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // If a user is found, generate a unique token
        $token = bin2hex(random_bytes(50));

        // Insert the email and token into the pass_reset table
        $insertQuery = "INSERT INTO pass_reset (email, token) VALUES ('$login', '$token')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Send the password reset email
            $FromName = "Ayush";
            $FromEmail = "no_reply@ayush.com";
            $ReplyTo = "ayushinfo@gmail.com";
            $credits = "All rights are reserved | Ayush";

            $headers = "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: " . $FromName . " <" . $FromEmail . ">\n";
            $headers .= "Reply-To: " . $ReplyTo . "\n";
            $headers .= "X-Sender: <" . $FromEmail . ">\n";
            $headers .= "X-Mailer: PHP\n";
            $headers .= "X-Priority: 1\n";
            $headers .= "Return-Path: <" . $FromEmail . ">\n";
            $subject = "You have received a password reset email";
            $msg = "Your password reset link: <br> http://localhost:8081/php/form/password-reset.php?token=" . $token . " <br> Reset your password with this link. Click or open it in a new tab. <br><br> <br> <br> <center>" . $credits . "</center>";

            if (@mail($login, $subject, $msg, $headers, '-f' . $FromEmail)) {
                header("location: forgot_password.php?sent=1");
            } else {
                header("location: forgot_password.php?servererr=1");
            }
        } else {
            header("location: forgot_password.php?somethingwrong=1");
        }
    } else {
        header("location: forgot_password.php?err=" . $login);
    }
}
?>
