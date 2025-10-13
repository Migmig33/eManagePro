<?php
// db_connect.php
$servername = "localhost";
$username   = "root";
$password   = "";         // XAMPP default
$dbname     = "my_app_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database.<br>";
}
// Optional: set charset
$conn->set_charset("utf8mb4");
?>
