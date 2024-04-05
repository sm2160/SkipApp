<?php
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $filepath = $filename;

    // Output the image
    header('Content-Type: image/jpeg');
    
    if (file_exists($filepath)) {
        readfile($filepath);
    } else {
        echo "Image not found: " . $filename;
    }
} else {
    echo "Invalid request";
}
?>