<?php
require_once "../classes/config.php";
require_once "../classes/Db.php";


        $sql = "SELECT COUNT(*) AS count FROM notification WHERE seen = 0";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute();
        
        if($sqlstmt->rowCount() > 0){
            $result = $sqlstmt->fetch();
            echo json_encode(['count' => $result['count']]);
} else {
    echo json_encode(['count' => 0]);
}



?>