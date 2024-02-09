<?php
$servername = "php24-db-1"; // MySQL server hostname
$username = "team18";     // MySQL username
$password = "team18";     // MySQL password
$dbname = "team18";       // the name of database

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>