<?php
session_start();
require_once '../classes/Db.php';
require_once '../classes/User.php';
require_once '../classes/config.php'; // This file should handle your database connection

// Check if user is logged in
if (!isset($_SESSION['useronline'])) {
    die("You need to be logged in to add favorites.");
}

// Check if track_id is provided
if (!isset($_POST['track_id'])) {
    die("No track specified.");
}

$user_id = $_SESSION['useronline'];
$track_id = intval($_POST['track_id']);

// Insert the track into the user's favorites
$sql = "INSERT INTO favorites (fav_userid, fav_trackid) VALUES ('$user_id', '$track_id')";
var_dump($sql);
die;
// Check if the query was successful
if ($conn->query($sql) === TRUE) {
    echo "Track added to favorites.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>