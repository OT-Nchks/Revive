<?php
require_once "Db.php";

class Quotes extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }


#METHOD TO FETCH QUOTES
    public function fetch_quotes(){
    $sql = "SELECT * FROM quote JOIN quote_category WHERE quote_qcatid =qcat_id";
    
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute();
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }



  #METHOD TO ADD QUOTES
    public function add_quotes($author, $message, $imageFile, $category)
    {
        try {
           
            $sql = "INSERT INTO quote (quote_author, quote_message, quote_image, quote_qcatid) VALUES (?, ?, ?, ?)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $result = $sqlstmt->execute([$author, $message, $imageFile, $category]);
    
            if ($result) {
                $_SESSION["admin_feedback"] = "Quote uploaded successfully!";
            } else {
                $_SESSION["admin_errormessage"] = "Failed to upload quote";
            }
    
            return $result;
        } catch (PDOException $error) {
            // Error handling for database errors
            $_SESSION["admin_errormessage"] = $error->getMessage();
            return false;
        }
    }


    #METHOD TO DELETE ANY QUOTE FROM THE LIST
    public function delete_quotes($quote_id) {
        try {
            // Begin transaction
            $this->dbconn->beginTransaction();
    
            // Delete the track
            $sql = "DELETE FROM quote WHERE quote_id=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$quote_id]);
    
            // Commit transaction
            $this->dbconn->commit();
            return true;
        } catch (Exception $e) {
            // Rollback transaction if something goes wrong
            $this->dbconn->rollBack();
            return false;
        }
    }


    #METHOD TO FETCH QUOTE CATEGORIES
    public function fetch_quotecategories(){
        $sql = "SELECT * FROM quote_category";
        $sqlstmt = $this->dbconn->prepare($sql);

        $sqlstmt->execute();
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }


    
    #METHOD TO GET QUOTES (FROM DB) THROUGH ITS ID
    public function get_quote_by_id($quote_id){
        $sql = "SELECT * FROM  quote WHERE quote_id=?";
        #preparing your statment
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$quote_id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    #METHOD TO UPDATE ANY QUOTE
    public function update_quotes($author, $message, $imageFile, $category) {
    try {
       
        // Update the track with the provided playlist ID
        $sql = "UPDATE quote SET quote_name=?, quote_message=?, quote_image=?, quote_qcatid=? WHERE quote_id=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $result = $sqlstmt->execute([$author, $message, $imageFile, $category]);
        return $result;
        
    } catch (PDOException $error) {
        // Error handling for database errors
        $_SESSION["admin_errormessage"] = $error->getMessage();
        return false;
    }
}


}  