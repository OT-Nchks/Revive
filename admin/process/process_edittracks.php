
<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/General.php";
require_once "../classes/Tracks.php";

if (isset($_POST['editBtn'])) {
    $track_id = $_POST['id'];
    $playlist_id = $_POST['playlist_id'];
    $pname = $_POST["playlistname"];
    $name = $_POST["trackname"];
    $artist = $_POST["artist"];
    $duration = $_POST["trackduration"];
    $category = $_POST["category"];

    // Handle file upload
    $audioFileName = $new['track_audio']; // Default to existing file name
    if (isset($_FILES['audiofile']) && $_FILES['audiofile']['error'] == UPLOAD_ERR_OK) {
        $audioFileTmpPath = $_FILES['audiofile']['tmp_name'];
        $audioFileName = basename($_FILES['audiofile']['name']);
        $audioFileSize = $_FILES['audiofile']['size'];
        $audioFileType = $_FILES['audiofile']['type'];
        $audioFileExtension = strtolower(pathinfo($audioFileName, PATHINFO_EXTENSION));
        
        // Directory where you want to save the uploaded file
        $uploadFileDir = '../admin/uploads/audioupload/';
        $dest_path = $uploadFileDir . $audioFileName;
        
        if (move_uploaded_file($audioFileTmpPath, $dest_path)) {
            // File uploaded successfully
        } else {
            $_SESSION['admin_errormessage'] = "There was an error moving the uploaded file.";
            header("location:../edit_tracks.php");
            exit();
        }
    }

    $edit = new Tracks();
    $chk = $edit->update_tracks($pname, $name, $artist, $duration, $category, $track_id, $playlist_id);
    if ($chk) {
        header("location:../admin_playlist.php");
        exit();
    } else {
        $_SESSION['admin_errormessage'] = "Failed to update track.";
        header("location:../edit_tracks.php");
        exit();
    }
} else {
    $_SESSION['admin_errormessage'] = "Track/Playlist update failed.";
    header("location:../edit_tracks.php");
    exit();
}
?>
