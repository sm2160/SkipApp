<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "/path/to/your/brighton/domain/server/folder/"; 
    $targetFile = $targetDirectory . basename($_FILES["uploadImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["uploadImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["uploadImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

 
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {

        if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $targetFile)) {

            echo "The file " . basename($_FILES["uploadImage"]["name"]) . " has been uploaded and marker added.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>