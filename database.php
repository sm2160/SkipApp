<?php

$host = "localhost:3306";
$username = "sm2160";
$password  = "Jetmonster619";
$dbName = "sm2160_ci609";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>