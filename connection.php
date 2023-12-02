<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ayush-portal";

if (!$conn = mysqli_connect($servername, $username, $password, $dbname)) {
    die("Failed to connect!");
}
?>
