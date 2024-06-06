<?php
require_once "Db.php";

class Stats extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }
   
    public function insert_assessment($wellbeing, $sleephabits1, $sleephabits2, $stress_level, $medical_conditions, $medical_notes, $user_id){
        try {
            // SQL query to insert assessment data into the database
            $sql = "INSERT INTO assessment(user_wellbeing, sleep_habits1, sleep_habits2, stress_level, medical_conditions, medical_notes, user_id) VALUES (?, ?, ?, ?, ?, ?,?)";
    
            // Prepare the SQL statement
            $sqlstmt = $this->dbconn->prepare($sql);
    
            // Execute the SQL statement with the provided parameters
            $records = $sqlstmt->execute([$wellbeing, $sleephabits1, $sleephabits2, $stress_level, $medical_conditions, $medical_notes, $user_id]);
    
            // Return the result of the execution (true/false)
            return $records;
            //print_r($records);
            //exit();
        } catch(PDOException $error) {
            // If an exception occurs, store the error message in session and return 0
            $_SESSION['user_errormessage'] = $error->getMessage();
            return 0;
        }
    }
    


        //fetching user's diary logs
        public function display_stats($user_id){
                
            $sql = "SELECT user_wellbeing, sleep_habits1, sleep_habits2, stress_level FROM assessment JOIN user WHERE user_id=?";

            $sqlstmt = $this->dbconn->prepare($sql);

            $sqlstmt->execute([$user_id]);
            $records=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }



        public function update_stats($wellbeing, $sleephabits1, $sleephabits2, $stress_level,$medical_conditions, $medical_notes, $id){
            $sql = "UPDATE assessment SET user_wellbeing=?, sleep_habits1=?, sleep_habits2=?, stress_level=?, medical_conditions=?, medical_notes=? WHERE assess_id=?";
            #preparing your statment
            $sqlstmt = $this->dbconn->prepare($sql);
            $result = $sqlstmt->execute([$wellbeing, $sleephabits1, $sleephabits2, $stress_level,$medical_conditions, $medical_notes, $id]);
            return $result;
        }


        public function get_stats_by_id($assess_id){
            $sql = "SELECT * FROM  assessment WHERE user_id=?";
            #preparing your statment
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$assess_id]);
            $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
            return $result;
    
        }


        public function fetch_stats(){
    
            $sql = "SELECT * FROM assessment";
    
            $sqlstmt = $this->dbconn->prepare($sql);
    
            $sqlstmt->execute();
            $records = $sqlstmt->fetch(PDO::FETCH_ASSOC);
            return $records;
           
        }
}
// $user= new Stats;
// echo "<pre>";
// print_r($records);
// echo "</pre>";