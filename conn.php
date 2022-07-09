<?php
$servername = "localhost";
$dbname = "testing";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username,$password, $dbname);

// Checkin  connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

?>