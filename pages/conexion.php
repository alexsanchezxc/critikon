<?php
if (!defined("conn")) {
    header("Location: index.php");
    exit();
}
$servername = "217.182.205.110:3306";
$username = "root";
$password = "Cr1t1k0n-";
$dbname = "critikon";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Fallo en la conexión: " . $conn->connect_error);
}
?>
