<?php
$host = "localhost:3306";
$username = "sm2160";
$password  = "Jetmonster619";
$dbName = "sm2160_ci609";

$conn = mysqli_connect($host, $username, $password, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $markerTitle = $_POST["markerTitle"];
    $markerDescription = $_POST["markerDescription"];
    $selectedImage = $_POST["selectedImage"];

    // Get the user's current location
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    // Handle file uploads
    $uploadImage = $_FILES["imageUpload"];
    $imageData = file_get_contents($uploadImage["tmp_name"]);
    $imageData = $conn->real_escape_string($imageData);

    // Insert data into the 'skip' table
    $sql = "INSERT INTO skip (title, description, selectedImage, uploadImage, latitude, longitude)
            VALUES ('$markerTitle', '$markerDescription', '$selectedImage', '$imageData', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
