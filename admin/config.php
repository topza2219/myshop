<?php
$servername = "localhost"; // Replace with your MySQL server name if different
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$database = "shop";        // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
