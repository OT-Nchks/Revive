<?php

session_start();
error_reporting(E_ALL);

require_once "../classes/Tracks.php";
require_once "../classes/General.php";

// Retrieve form data and sanitize
if (isset($_POST["uploadBtn"])) {
    $playlistname = $_POST["playlistname"];
    $trackname = $_POST["trackname"];
    $artist = $_POST["artist"];
    $duration = $_POST["trackduration"];
    $category = $_POST["category"];
    $track = $_FILES['audiofile'];
    $trackimage = $_FILES['imagefile'];

    // Check if a file was 
    $maxFileSize = 200 * 1024 * 1024; // 200MB in bytes

    if ((isset($track) && $track['error'] === UPLOAD_ERR_OK) && (isset($trackimage) && $trackimage['error'] === UPLOAD_ERR_OK)) {
        // Get the uploaded file information
        $trackfile = $track['name'];
        $fileTmpName = $track['tmp_name'];
        $fileSize = $track['size'];
        $fileError = $track['error'];
        $fileType = $track['type'];

        // Get upload details for image file
        $trackimageFile = $trackimage['name'];
        $fileTmpNameImage = $trackimage['tmp_name'];
        $fileSizeImage = $trackimage['size'];
        $fileErrorImage = $trackimage['error'];
        $fileTypeImage = $trackimage['type'];

        // Specify the directory where you want to store the uploaded files
        $uploadDir = '../uploads/audioupload/';

        // image file directory
        $uploadDirImage = '../uploads/imageupload/';

        // Create the audio upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Create the image upload directory if it doesn't exist
        if (!is_dir($uploadDirImage)) {
            mkdir($uploadDirImage, 0755, true);
        }

        if($fileSize>$maxFileSize){
            echo "Error: The audio file size exceeds the 200MB limit.";
        }else{
        // Move the uploaded file to the uploads directory
        $uploadFile = $uploadDir . basename($trackfile);
        if (move_uploaded_file($fileTmpName, $uploadFile)) {
            echo "Audio file uploaded successfully.";
        } else {
            echo "Error uploading audio file.";
        }

        // Move the uploaded image file to the image uploads directory
        $uploadFileImage = $uploadDirImage . basename($trackimageFile);
        if (move_uploaded_file($fileTmpNameImage, $uploadFileImage)) {
            echo "Image file uploaded successfully.";
        } else {
            echo "Error uploading Image file.";
        }
    }
        $track = new Tracks();
        $result = $track->add_tracks($playlistname, $trackname, $artist, $trackimageFile, $trackfile, $duration, $category); 

        if ($result) {
            $_SESSION["admin_feedback"] = "Track uploaded successfully!";
            header("Location: ../admin_playlist.php");
            exit();
        } else {
            $_SESSION["admin_errormessage"] = "Failed to upload the track";
            header("Location: ../admin_addmusic.php");
            exit();
        }
    } else {
        // If the file upload failed
        $_SESSION["admin_errormessage"] = "Error uploading files.";
        header("Location: ../admin_addmusic.php");
        exit();
    }
} else {
    // If the form was not submitted properly
    $_SESSION['admin_errormessage'] = "Please complete the form";
    header("Location: ../admin_addmusic.php");
    exit();
}
?>