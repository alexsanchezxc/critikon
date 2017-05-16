<?php
$servername = "8473.us-imm-sql1.000webhost.io:3306";
$username = "id1680601_critikon";
$password = "Cr1t1k0n_";
$dbname = "id1680601_critikon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
}
?>
