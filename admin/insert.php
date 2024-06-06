
<?php
require_once '../classes/config.php'; 
require_once '../classes/Db.php';

class Notification extends Db {

    private $dbconn;
    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function insertNotification($message) {
        try {
            $sql = "INSERT INTO notification (message) VALUES (:msg)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->bindValue(':msg', $message, PDO::PARAM_STR);
            return $sqlstmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}

$response = [];

if (isset($_POST['msg'])) {
    $notification = new Notification();
    $result = $notification->insertNotification($_POST['msg']);

    if ($result) {
        $response['status'] = 'added';
    } else {
        $response['status'] = 'failed';
    }
} else {
    $response['status'] = 'no_message';
}

echo json_encode($response);
?>
