<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "critikon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
}
?>
