<?php
// UPDATE THESE AFTER STEP 5 (MySQL DATABASE CREATION)
$servername = "sqlXXX.epizy.com"; // Replace with actual host
$username   = "your_db_username";
$password   = "your_db_password";
$dbname     = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
