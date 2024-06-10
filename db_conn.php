<?php
    // Define database connection parameters
    $host = "localhost";
    $username = "your_username"; // Change this to your actual MySQL username
    $password = "your_password"; // Change this to your actual MySQL password
    $db_name = "project1_db";

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully";
    }
?>
