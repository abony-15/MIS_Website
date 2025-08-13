<?php
// db_config.php
$host = "localhost"; 
$dbname = "zaima_db";
$username = "root";  // Default XAMPP/MAMP user
$password = "";      // Default password (empty)

// Connect
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>