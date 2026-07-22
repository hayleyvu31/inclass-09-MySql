<?php
$host = "localhost";
$user = "tvu53";
$pass = "tvu53";
$dbname = "tvu53";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>