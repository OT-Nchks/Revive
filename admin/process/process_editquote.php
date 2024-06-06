
<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Quotes.php";

if (isset($_POST['editBtn'])) {
    $quote_id = $_POST['id'];
    $author = $_POST["author"];
    $message = $_POST["message"];
    $category = $_POST["category"];
    $quoteimage = $_FILES["imagefile"];

    // Handle file upload
    if (isset($quoteimage) && $quoteimage['error'] == UPLOAD_ERR_OK) {
        $imageFileTmpPath = $quoteimage['tmp_name'];
        $imageFileName = $quoteimage['name'];
        $imageFileSize = $quoteimage['size'];
        $imageFileType = $quoteimage['type'];
        $imageFileExtension = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
        
        // Directory where you want to save the uploaded file
        $uploadFileDir =  '../uploads/imageupload/'; 
        $dest_path = $uploadFileDir . $imageFileName;
        
        if (move_uploaded_file($imageFileTmpPath, $dest_path)) {
            // File uploaded successfully
        } else {
            $_SESSION['admin_errormessage'] = "There was an error moving the uploaded file.";
            header("location:../edit_quotes.php");
            exit();
        }
    }

    $edit = new Quotes();
    $chk = $edit->update_quotes($author, $message, $dest_path, $category);
    if ($chk) {
        header("location:../admin_quotelist.php");
        exit();
    } else {
        $_SESSION['admin_errormessage'] = "Failed to update quote.";
        header("location:../edit_quotes.php");
        exit();
    }
    } else {
        $_SESSION['admin_errormessage'] = "Quote update failed.";
        header("location:../edit_quotes.php");
        exit();
    }
?>
