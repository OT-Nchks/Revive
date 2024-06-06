<?php
    require_once('Db.php');

    class User extends Db{
  
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }


    #METHOD TO INSERT USER'S DETAILS TO THE DATABASE
    public function insert_user($user_fname, $user_lname, $user_email, $user_dob, $user_gender, $user_stateid, $user_password){

        try{

            $existing_user = $this->get_user_by_email($user_email);
            if ($existing_user) {
                $_SESSION['errormessage'] = "User with this email already exists";
                return 0; 
            }

             // Check if the provided state_id exists
        $checkStateSql = "SELECT COUNT(*) FROM state WHERE state_id = ?";
        $checkStateStmt = $this->dbconn->prepare($checkStateSql);
        $checkStateStmt->execute([$user_stateid]);
        $stateExists = $checkStateStmt->fetchColumn();

        if ($stateExists == 0) {
            throw new Exception("Invalid state ID provided.");
        }

        #write sql query
        $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_dob, user_gender, user_stateid, user_password) VALUES(?,?,?,?,?,?,?)";

        #prepare sql statement 
        $sqlstmt = $this->dbconn->prepare($sql);
        $hashed =password_hash($user_password,PASSWORD_DEFAULT);
        #execute
        $resp = $sqlstmt->execute([$user_fname, $user_lname, $user_email, $user_dob, $user_gender, $user_stateid, $hashed]);
        
       if ($resp) {
        $id = $this->dbconn->lastInsertId();
        return $id;
        } else {
            $_SESSION['errormessage'] = "Failed to insert user.";
            return 0;
        }
        }catch(PDOException $error){
            $_SESSION['errormessage'] = $error->getMessage();
            return 0;
       }
       catch(Exception $error){
        $_SESSION['errormessage'] = $error->getMessage();
        return 0;
    }
} 

 private function get_user_by_email($email) {
            $sql = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }




         #METHOD TO LOG OUT USER
         public function logout_user(){
            session_unset();
            session_destroy();
            header("location:../php/login.php");
        }




        #METHOD TO CALL THE USER'S NAME ON THEIR DASHBOARD PROFILE
       public function get_user_by_id($user_id){
            try{
             #write sql query
             $sql = "SELECT * FROM users WHERE user_id =?";

             #prepare sql statement
             $sqlstmt = $this->dbconn->prepare($sql);

             #execute
              $sqlstmt->execute([$user_id]);
             $result = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
             return $result;

            } catch(PDOException $error){  
             $_SESSION['errormessage'] = $error->getMessage();  #setting error message session
             return 0;           
             }
             catch(Exception $error){
                 $_SESSION['errormessage'] = $error->getMessage();  #setting error message session
                 return 0;  
             }
         }



      #METHOD TO GET USER'S EMAIL(in profiletab.php)
        public function fetch_user_email($user_id) {
            try {
                $sql = "SELECT user_email FROM users WHERE user_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$user_id]);
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                return $userData['user_email'];
            } catch(PDOException $error) {
                // Handle the exception
                return 0;
            }
        }



         #METHOD TO LOGIN USER & VALIDATE
         public function login_user($user_email, $user_password){
            try{
            #write sql query
            $sql = "SELECT * FROM users WHERE user_email =?";

            #prepare sql statement
            $sqlstmt = $this->dbconn->prepare($sql);

            #execute
            
             $sqlstmt->execute([$user_email]);
            $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);

            if($result){              
                $hashed_pass = $result['user_password'];   
                $checkPswd = password_verify($user_password, $hashed_pass);  //true or false

                if($checkPswd){
                    return $result['user_id'];
            }
            else{
                $_SESSION["errormessage"]= "Invalid Password";
                return 0;
            }
        }
            else{
                $_SESSION["errormessage"]= "Invalid email";
                return 0;
            }
           } 
           catch(Exception $error){  
            $_SESSION['useronline'] = $error->getMessage(); 
        }
    }


    #METHOD TO FETCH STATE
        public function fetch_state(){
            $sql = "SELECT * FROM state";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute();
            $state_records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $state_records;
        }


        #METHOD TO UPDATE USER DETAILS
        public function update_user($user_fname, $user_email,$user_id){
            $sql = "UPDATE users SET user_fname =?, user_email=? WHERE user_id = ?";
    
            $sqlstmt = $this->dbconn->prepare($sql);
    
            $records=$sqlstmt->execute([$user_fname, $user_email,$user_id]);
            // $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            
            if($records){
                return true;
            }
            else{
                return false;
            }
        }


       #GET PASSWORD
            public function get_hashed_password($user_id) {
                $sql = "SELECT user_password FROM users WHERE user_id = ?";
                $sqlstmt = $this->conn->prepare($sql);
               // $sqlstmt->bind('i', $user_id);
                $sqlstmt->execute([$user_id]);
                //$result = $sqlstmt->get_result();
                //$row = $result->fetch_assoc();
                $row = $sqlstmt -> fetch(PDO::FETCH_ASSOC);
               
                if ($row) {
                return $row['user_password']; // Return hashed password
                } else {
                return false; // User not found or error
                }
            }



        #METHOD TO UPDATE USER PASSWORD
        public function update_userpwd($user_password, $user_id){
            $sql = "UPDATE users SET user_password =?  WHERE user_id = ?";
    
            $sqlstmt = $this->dbconn->prepare($sql);
    
            $records=$sqlstmt->execute([$user_password, $user_id]);
            // $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            
            if($records){
                return true;
            }
            else{
                return false;
            }
        }



        public function get_current_user($user_id){
            try{
                $sql = "SELECT * FROM users WHERE user_id = ?";
                $sqlstmt = $this -> dbconn -> prepare($sql);
                $sqlstmt -> execute([$user_id]);
                $result = $sqlstmt -> fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e){
                $_SESSION['errormessage'] = $e->getMessage();
                return 0;
            }
            catch(Exception $f){
                $_SESSION['errormessage'] = $f->getMessage();
                return 0;
            }
        }




        #METHOD TO FETCH QUOTES BY ID
        public function get_quoteId($quote_id){
        $sql = "SELECT * FROM quote WHERE quote_id=?";
        
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$quote_id]);
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }


        #METHOD TO FETCH QUOTES BY RANDOM
        public function fetch_random_quotes_byCategory($quote_category){
            $sql = "SELECT quote.*, quote_category.qcat_name FROM quote JOIN quote_category ON quote.quote_qcatid = quote_category.qcat_id WHERE quote_category.qcat_name=? ORDER BY RAND() LIMIT 1";
             
            // Prepare the SQL statement
            $sqlstmt = $this->dbconn->prepare($sql);

            $sqlstmt->execute([$quote_category]);
        
            // Fetch the records
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $records;  
        }


        #METHOD TO FETCH INSERT REVIEWS
        public function leave_review($name, $message, $rating){
            try{ 
                $sql="INSERT INTO reviews(client_name, review_rating, review_message) VALUES(?,?,?)";

                $sqlstmt = $this->dbconn->prepare($sql);
            
                $result= $sqlstmt->execute([$name, $message, $rating]);
                return $result;
            }
            catch(PDOException $e){
                return 0;
            }
            catch(Exception $e){
                return 0;
            }
        }



        #METHOD TO FETCH REVIEWS FROM A SPECIFIC RANGE
        public function get_reviews_by_IdRange($idStart, $idEnd){
            $sql = "SELECT * FROM reviews WHERE review_id>=? AND review_id<=? ORDER BY review_id ASC";
             
            // Prepare the SQL statement
            $sqlstmt = $this->dbconn->prepare($sql);
           
            $sqlstmt->execute([$idStart, $idEnd]);
        
            // Fetch the records
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $records;  
        }


        #METHOD TO FETCH REVIEWS(while excluding a specific range)
        public function get_reviews_excl_IdRange($idStart, $idEnd){
            $sql = "SELECT * FROM reviews WHERE review_id <? OR review_id >? ORDER BY review_id ASC";
             
            // Prepare the SQL statement
            $sqlstmt = $this->dbconn->prepare($sql);
           
            $sqlstmt->execute([$idStart, $idEnd]);
        
            // Fetch the records
            $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $records;  
        }



        #METHOD TO FETCH BLOGS
        public function fetch_blog($blog_id){
            $sql = "SELECT * FROM blog WHERE blog_id=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$blog_id]);
            $blogs = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $blogs;
        }

        #METHOD TO FETCH ALL BLOGS
        public function fetch_allBlogs(){
            $sql = "SELECT * FROM blog";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute();
            $blogs = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            return $blogs;
        }


        public function add_fav($user_id, $track_id){
            try{ 
                $sql="INSERT INTO favorites(fav_userid, fav_trackid) VALUES(?,?)";

                $sqlstmt = $this->dbconn->prepare($sql);
            
                $result= $sqlstmt->execute([$user_id, $track_id]);
                return $result;
            }
            catch(PDOException $e){
                return 0;
            }
            catch(Exception $e){
                return 0;
            }
        }

   }
  
?>