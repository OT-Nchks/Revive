<?php
require_once "Db.php";

class Transaction extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

   /* public function insert_trans_details($ref, $user_id){

        $sql = "INSERT INTO transaction(trans_ref, trans_by)VALUES(?,?)";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref, $user_id]);

        $id = $this->dbconn->lastInsertId();
            return $id;
    }



    public function get_trans_amt($id){
        $sql = "SELECT trans_amt FROM transaction WHERE trans_id=?";
        $sqlstmt =$this->dbconn->prepare($sql);
        $sqlstmt->execute([$id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);

        $amt=$result['trans_amt'];
        return $amt;
    }


    public function get_trans_ref($ref){
        $sql = "SELECT * FROM transaction JOIN trans_details ON trans_id=det_transid WHERE trans_ref=?";

        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref]);
        $result= $sqlstmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function get_trans_byuser($user_id){
        $sql = "SELECT * FROM transaction JOIN trans_details ON trans_id=det_transid WHERE trans_by=?";

        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$user_id]);
        $result= $sqlstmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function get_transaction_amt($ref){
        $sql = "SELECT trans_amt FROM transaction WHERE trans_ref=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref]);
        $result= $sqlstmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    


    public function sub_pay2($email, $plan, $ref, $amount, $user_id){

        $sql = "INSERT INTO transaction(email, plan, trans_ref, trans_amt, trans_by)VALUES(?,?,?,?,?)";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$email, $plan, $ref, $amount, $user_id]);

        $id = $this->dbconn->lastInsertId();
            return $id;
}

public function sub_pay($email, $plan, $ref, $amount, $user_id){
    try {
        // Begin transaction
        $this->dbconn->beginTransaction();

        // Insert into transaction table
        $sql = "INSERT INTO transaction(email, plan, trans_ref, trans_amt, trans_by) VALUES (?, ?, ?, ?, ?)";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$email, $plan, $ref, $amount, $user_id]);

        // Get the last inserted ID
        $trans_id = $this->dbconn->lastInsertId();

        // Insert into trans_details table
        $sqlDetails = "INSERT INTO trans_details(det_transid) VALUES (?)";
        $sqlstmtDetails = $this->dbconn->prepare($sqlDetails);
        $sqlstmtDetails->execute([$trans_id]);

        // Commit transaction
        $this->dbconn->commit();

        return $trans_id;
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $this->dbconn->rollBack();
        throw $e;
    }
}

}*/














    public function insert_trans_details($ref, $user_id) {
        $sql = "INSERT INTO transaction(trans_ref, trans_by) VALUES (?, ?)";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref, $user_id]);

        $id = $this->dbconn->lastInsertId();
        return $id;
    }

    public function insert_trans_detail($trans_id, $topic_id) {
        $sql = "INSERT INTO trans_details(det_transid, topic_id) VALUES (?, ?)";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$trans_id, $topic_id]);
    }

    public function get_trans_amt($id) {
        $sql = "SELECT trans_amt FROM transaction WHERE trans_id=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);

        return $result['trans_amt'];
    }

    public function get_trans_ref($ref) {
        $sql = "SELECT * FROM transaction JOIN trans_details ON trans_id=det_transid WHERE trans_ref=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref]);
        $result = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function get_trans_byuser($user_id) {
        $sql = "SELECT * FROM transaction JOIN trans_details ON trans_id=det_transid WHERE trans_by=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$user_id]);
        $result = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function get_transaction_amt($ref) {
        $sql = "SELECT trans_amt FROM transaction WHERE trans_ref=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$ref]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function sub_pay($email, $plan, $ref, $amount, $user_id){
        try {
            // Begin transaction
            $this->dbconn->beginTransaction();
    
            // Insert into transaction table
            $sql = "INSERT INTO transaction(email, plan, trans_ref, trans_amt, trans_by) VALUES (?, ?, ?, ?, ?)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$email, $plan, $ref, $amount, $user_id]);
    
            // Get the last inserted ID
            $trans_id = $this->dbconn->lastInsertId();
    
            // Insert into trans_details table
            $sqlDetails = "INSERT INTO trans_details(det_transid) VALUES (?)";
            $sqlstmtDetails = $this->dbconn->prepare($sqlDetails);
            $sqlstmtDetails->execute([$trans_id]);
    
            // Commit transaction
            $this->dbconn->commit();
    
            return $trans_id;
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $this->dbconn->rollBack();
            throw $e;
        }
    }
}
?>
