
<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Blog.php";

if (isset($_POST['editBtn'])) {
    $blog_id = $_POST['id'];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $article = $_POST["article"];
    $category = $_POST["category"];
    $date = $_POST["date"];
    $blogimage = $_FILES["imagefile"];

    // Handle file upload
    if (isset($blogimage) && $blogimage['error'] == UPLOAD_ERR_OK) {
        $imageFileTmpPath = $blogimage['tmp_name'];
        $imageFileName = $blogimage['name'];
        $imageFileSize = $blogimage['size'];
        $imageFileType = $blogimage['type'];
        $imageFileExtension = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
        
        // Directory where you want to save the uploaded file
        $uploadFileDir =  '../uploads/imageupload/'; 
        $dest_path = $uploadFileDir . $imageFileName;
        
        if (move_uploaded_file($imageFileTmpPath, $dest_path)) {
            // File uploaded successfully
        } else {
            $_SESSION['admin_errormessage'] = "There was an error moving the uploaded file.";
            header("location:../edit_blogs.php");
            exit();
        }
    }

    $edit = new Blog();
    $chk = $edit->update_blogs($dest_path, $title, $subtitle, $category, $article, $date);
    if ($chk) {
        header("location:../admin_bloglist.php");
        exit();
    } else {
        $_SESSION['admin_errormessage'] = "Failed to update quote.";
        header("location:../edit_blogs.php");
        exit();
    }
    } else {
        $_SESSION['admin_errormessage'] = "Quote update failed.";
        header("location:../edit_blogs.php");
        exit();
    }
?>
