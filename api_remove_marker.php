

<?php
$host = "localhost:3306";
$username = "sm2160";
$password  = "Jetmonster619";
$dbName = "sm2160_ci609";

$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the DELETE request
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET["id"]; // Update variable name to 'id'

    // Validate and sanitize the marker ID to prevent SQL injection
    $id = $conn->real_escape_string($id);

    // Remove the marker from the database
    $sql = "DELETE FROM skip WHERE id = '$id'"; // Use 'id' in the SQL query

    if ($conn->query($sql) === TRUE) {
        echo "Marker $id removed successfully";
    } else {
        echo "Error removing marker: " . $conn->error;
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
