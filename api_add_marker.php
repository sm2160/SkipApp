<?php
$host = "localhost:3306";
$username = "sm2160";
$password  = "Jetmonster619";
$dbName = "sm2160_ci609";

$conn = new mysqli($host, $username, $password, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["markerTitle"];
    $description = $_POST["markerDescription"];
    $selectedImage = $_POST["selectedImage"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
     $skips = $_POST["skips"];
      $freeCollection = $_POST["freeCollection"];


    $uploadImage = ''; 
    if (isset($_FILES["uploadImage"]) && $_FILES["uploadImage"]["error"] == 0) {
        $target_dir = "images/"; 
        $target_file = $target_dir . basename($_FILES["uploadImage"]["name"]);

  
        if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
            $uploadImage = $target_file; 
        } else {
            echo "Error uploading file.";
            exit();
        }
    }


    $sql = "INSERT INTO skip (title, description, selectedImage, uploadImage, latitude, longitude, skips, freeCollection)
        VALUES ('$title', '$description', '$selectedImage', '$uploadImage', '$latitude', '$longitude', '$skips', '$freeCollection')";


    if ($conn->query($sql) === TRUE) {
        echo "Marker added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>