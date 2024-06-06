<?php
require_once "Db.php";

class Blog extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }


#METHOD TO FETCH BLOGS
    public function fetch_blogs($blog_id){
    $sql = "SELECT * FROM blog WHERE blog_id=?";
    
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$blog_id]);
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function display_blogs(){
        $sql = "SELECT * FROM blog";
        
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute();
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }


    #METHOD TO FETCH BLOG CATEGORIES
    public function fetch_blogCat(){
        $sql = "SELECT * FROM blog WHERE blog_category=?";
        
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute();
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }



  #METHOD TO ADD BLOGS
    public function add_blogs($imageFile, $title, $subtitle, $category, $article, $date)
    {
        try {
           
            $sql = "INSERT INTO blog (blog_image, blog_title, blog_subtitle, blog_category, blog_article, blog_date) VALUES (?, ?, ?, ?, ?, ?)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $result = $sqlstmt->execute([$imageFile, $title, $subtitle, $category, $article, $date]);
    
            if ($result) {
                $_SESSION["admin_feedback"] = "Blog uploaded successfully!";
            } else {
                $_SESSION["admin_errormessage"] = "Failed to upload blog";
            }
    
            return $result;
        } catch (PDOException $error) {
            // Error handling for database errors
            $_SESSION["admin_errormessage"] = $error->getMessage();
            return false;
        }
    }


    #METHOD TO DELETE ANY BLOG FROM THE LIST
    public function delete_blogs($blog_id) {
        try {
            // Begin transaction
            $this->dbconn->beginTransaction();
    
            // Delete the track
            $sql = "DELETE FROM blog WHERE blog_id=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$blog_id]);
    
            // Commit transaction
            $this->dbconn->commit();
            return true;
        } catch (Exception $e) {
            // Rollback transaction if something goes wrong
            $this->dbconn->rollBack();
            return false;
        }
    }



    #METHOD TO UPDATE ANY BLOG
    public function update_blogs($imageFile, $title, $subtitle, $category, $article, $date) {
    try {
       
        // Update the track with the provided playlist ID
        $sql = "UPDATE blog SET blog_image=?, blog_title=?, blog_subtitle=?, blog_category=?, blog_article=?, blog_date=? WHERE blog_id=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $result = $sqlstmt->execute([$imageFile, $title, $subtitle, $category, $article, $date]);
        return $result;
        
    } catch (PDOException $error) {
        // Error handling for database errors
        $_SESSION["admin_errormessage"] = $error->getMessage();
        return false;
    }
}


}  