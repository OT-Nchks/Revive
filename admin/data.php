<?php
require_once "../classes/config.php";
require_once "../classes/Db.php";


class Notification extends Db {
    private $dbconn;
    public function __construct()
    {
        $this->dbconn = $this->connect();
    }
    public function updateNotificationsToSeen() {
        try {
            $sql = "UPDATE notification SET seen = 1";
            $sqlstmt = $this->dbconn->prepare($sql);
            return $sqlstmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    public function fetchSeenNotifications() {
        try {
            $sql = "SELECT message AS msg FROM notification WHERE seen = 1";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute();
            return $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}

$notification = new Notification();

if ($notification->updateNotificationsToSeen()) {
    $result = $notification->fetchSeenNotifications();
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode(['status' => 'failed to update notifications']);
}
?>