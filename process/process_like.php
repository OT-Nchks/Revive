<?php
session_start();
require_once "../classes/Db.php";
require_once "../classes/Music.php";

$user_id = $_SESSION['useronline'];
$track_id = isset($_POST['track_id']) ? $_POST['track_id'] : null;
$action = isset($_POST['action']) ? $_POST['action'] : null;

// Debugging output
error_log('track_id: ' . $track_id);  // Log the received track_id
error_log('action: ' . $action);      // Log the received action

if (!$track_id || !$action) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit();
}

$music = new Music();

if ($action === 'like') {
    $result = $music->like_track($track_id, $user_id);
} elseif ($action === 'unlike') {
    $result = $music->unlike_track($track_id, $user_id);
} else {
    $result = false;
}

if ($result) {
    echo json_encode(['status' => 'success', 'action' => $action]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database operation failed']);
}
?>
