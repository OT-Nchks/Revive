<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Quotes.php";

// Retrieve form data and sanitize
if (isset($_POST["addBtn"])) {
    $author = $_POST["author"];
    $message = $_POST["message"];
    $category = $_POST["category"];
    $quoteimage = $_FILES['imagefile'];

    // Check if a file was uploaded
    if ((isset($quoteimage) && $quoteimage['error'] === UPLOAD_ERR_OK)) {

        // Get upload details for image file
        $quoteimageFile = $quoteimage['name'];
        $fileTmpNameImage = $quoteimage['tmp_name'];
        $fileSizeImage = $quoteimage['size'];
        $fileErrorImage = $quoteimage['error'];
        $fileTypeImage = $quoteimage['type'];


        // image file directory
        $uploadDirImage = '../uploads/imageupload/';

        // Create the image upload directory if it doesn't exist
        if (!is_dir($uploadDirImage)) {
            mkdir($uploadDirImage, 0755, true);
        }


        // Move the uploaded image file to the image uploads directory
        $uploadFileImage = $uploadDirImage . basename($quoteimageFile);
        if (move_uploaded_file($fileTmpNameImage, $uploadFileImage)) {
            echo "Image file uploaded successfully.";
        } else {
            echo "Error uploading Image file.";
        }

        $quote = new Quotes();
        $result = $quote->add_quotes($author, $message, $quoteimageFile, $category); 

        if ($result) {
            $_SESSION["admin_feedback"] = "Quote uploaded successfully!";
            header("Location: ../admin_quotelist.php");
            exit();
        } else {
            $_SESSION["admin_errormessage"] = "Failed to add quote";
            header("Location: ../admin_addquotes.php");
            exit();
        }
    } else {
        // If the file upload failed
        $_SESSION["admin_errormessage"] = "Error uploading files.";
        header("Location: ../admin_addquotes.php");
        exit();
    }
} else {
    // If the form was not submitted properly
    $_SESSION['admin_errormessage'] = "Please complete all fields";
    header("Location: ../admin_addquotes.php");
    exit();
}
?>