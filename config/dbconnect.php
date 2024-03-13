<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blog_sample";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo ("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>