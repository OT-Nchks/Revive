<?php
require_once "Db.php";

class Diary extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }
   
    public function insert_diarymsg($date, $notes, $start, $end, $user_id){ 

        try{
        $sql = "INSERT INTO diary(diary_date,diary_notes, sleep_start, sleep_end, diary_userid)VALUES(?,?,?,?,?)";

        $sqlstmt = $this->dbconn->prepare($sql);

        $records=$sqlstmt->execute([$date, $notes, $start, $end, $user_id]);
        return $records;

            }
        catch(PDOException $error){
            $_SESSION['user_errormessage'] = $error->getMessage();

            return 0;
        }
       
}


//fetching user's diary logs
    public function display_diarylists($user_id){
        try {
            $sql = "SELECT * FROM diary WHERE diary_userid=?";
    
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->bindParam(1, $user_id, PDO::PARAM_INT);

            $sqlstmt->execute();
            $diary_logs = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Check if any diary logs were found
                if ($diary_logs) {
                    return $diary_logs; // Return the diary logs
                } else {
                    return []; // Return an empty array if no logs found
                }
            }
            catch(PDOException $error) {
                // Handle any database errors
                echo "Error: " . $error->getMessage();
                return []; // Return an empty array on error
            }
        }

    
}
// $contact= new Diary;
// echo "<pre>";
// print_r($contact->display_diarylists(1));
// echo "</pre>";