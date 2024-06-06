<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Blog.php";

// Retrieve form data and sanitize
if (isset($_POST["addBtn"])) {
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $article = $_POST["article"];
    $category = $_POST["category"];
    $date = $_POST["date"];
    $blogimage = $_FILES["imagefile"];

    // Check if a file was uploaded
    if ((isset($blogimage) && $blogimage['error'] === UPLOAD_ERR_OK)) {

        // Get upload details for image file
        $blogimageFile = $blogimage['name'];
        $fileTmpNameImage = $blogimage['tmp_name'];
        $fileSizeImage = $blogimage['size'];
        $fileErrorImage = $blogimage['error'];
        $fileTypeImage = $blogimage['type'];


        // image file directory
        $uploadDirImage = '../uploads/imageupload/'; 

        // Create the image upload directory if it doesn't exist
        if (!is_dir($uploadDirImage)) {
            mkdir($uploadDirImage, 0755, true);
        }


        // Move the uploaded image file to the image uploads directory
        $uploadFileImage = $uploadDirImage . basename($blogimageFile);
        if (move_uploaded_file($fileTmpNameImage, $uploadFileImage)) {
            echo "Image file uploaded successfully.";
        } else {
            echo "Error uploading Image file.";
        }

        $blog = new Blog();
        $result = $blog->add_blogs($blogimageFile, $title, $subtitle, $category, $article, $date); 

        if ($result) {
            $_SESSION["admin_feedback"] = "Blog uploaded successfully!";
            header("Location: ../admin_bloglist.php");
            exit();
        } else {
            $_SESSION["admin_errormessage"] = "Failed to add blog";
            header("Location: ../admin_addblog.php");
            exit();
        }
    } else {
        // If the file upload failed
        $_SESSION["admin_errormessage"] = "Error uploading files.";
        header("Location: ../admin_addblog.php");
        exit();
    }
} else {
    // If the form was not submitted properly
    $_SESSION['admin_errormessage'] = "Please complete all fields";
    header("Location: ../admin_addblog.php");
    exit();
}
?>