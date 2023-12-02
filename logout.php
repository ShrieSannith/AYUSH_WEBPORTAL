<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['U_ID'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session data on the server
    session_unset();
    session_destroy();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}

// Redirect the user to the login page
header("Location: index.php");
exit;
?>
