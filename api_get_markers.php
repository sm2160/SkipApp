<?php

header('Content-Type: application/json');
// Connect to your MySQL database
$host = "localhost:3306";
$username = "sm2160";
$password  = "Jetmonster619";
$dbName = "sm2160_ci609";

$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve markers from the "skip" table
$sql = "SELECT id, title, description, selectedImage, uploadImage, latitude, longitude, skips, freeCollection FROM skip";
$result = $conn->query($sql);

$markers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $markers[] = $row;
    }
}

// Return markers as JSON
echo json_encode($markers);

$conn->close();
?>