<?php
require_once "Db.php";

class Admin extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }
   


    #METHOD TO LOGIN ADMIN 
    public function admin_login($admin_email, $admin_password){
        try{ 
         
         #write sql query
         $sql = "SELECT * FROM admin WHERE admin_email = ?";
 
         #prepare your sql statment
         $sqlstmt = $this-> dbconn -> prepare($sql);
 
         #execute
         $result = $sqlstmt->execute([$admin_email]);
         $record= $sqlstmt->fetch(PDO::FETCH_ASSOC);
 
         if($record){ //if username is correct
             $hashed  = $record["admin_pswd"];
             $chk = password_verify($admin_password, $hashed); //true or false
 
             if($chk){ //if login is correct
                 $_SESSION['adminonline'] = $record['admin_id'];
                 return 1;
             }
             else{
                 $_SESSION['admin_errormessage'] = "Invalid credentials";
                 return 0;
             }
         }
         else{ //if username is not correct
             $_SESSION['admin_errormessage'] = "Invalid credentials";
             return 0;
         }
    
         }
         catch(PDOException  $error1){
             $_SESSION['admin_errormessage'] = $error1->getMessage();
             return 0;
         }
         catch(PDOException  $error2){
             $_SESSION['admin_errormessage'] = $error2->getMessage();
             return 0;
         }
     }




     #METHOD TO CALL THE ADMIN'S NAME ON THEIR DASHBOARD PROFILE
     public function get_admin_by_id($admin_id){
        try{
         #write sql query
         $sql = "SELECT * FROM admin WHERE admin_id =?";

         #prepare sql statement
         $sqlstmt = $this->dbconn->prepare($sql);

         #execute
          $sqlstmt->execute([$admin_id]);
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


    #ADMIN LOGOUT
    public function admin_logout(){
        session_unset();
        session_destroy();
    }

    #GET ADMIN EMAIL
    public function get_admin_email($admin_id) {
        try {
            $sql = "SELECT admin_email FROM admin WHERE admin_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$admin_id]);
            $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
            return $adminData['admin_email'];
        } catch(PDOException $error) {
            // Handle the exception
            return 0;
        }
    }

    
        #METHOD TO GET CURRENT ADMIN
    public function get_current_admin($admin_id){
        try{
            $sql = "SELECT * FROM admin WHERE admin_id = ?";
            $sqlstmt = $this -> dbconn -> prepare($sql);
            $sqlstmt -> execute([$admin_id]);
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


    #METHOD TO UPDATE ADMIN DETAILS
    public function update_admin($admin_username, $admin_email, $admin_id){
        $sql = "UPDATE admin SET admin_username =?, admin_email=? WHERE admin_id = ?";

        $sqlstmt = $this->dbconn->prepare($sql);

        $records=$sqlstmt->execute([$admin_username, $admin_email, $admin_id]);
        // $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($records){
            return true;
        }
        else{
            return false;
        }
    }


    #FETCH REGISTERED USERS
    public function fetch_users(){
        $sql = "SELECT users.user_fname, users.user_lname, users.user_email, users.user_gender,  state.state_name FROM users JOIN state ON users.user_stateid = state.state_id";
        
        $sqlstmt = $this->dbconn->prepare($sql);

        $sqlstmt->execute();
        $result=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    #FETCH LATEST REGISTERED USERS
    public function fetch_recent_users(){
        $sql = "SELECT users.user_fname, users.user_lname, users.user_email, users.user_gender,  state.state_name FROM users JOIN state ON users.user_stateid = state.state_id ORDER BY users.user_id DESC LIMIT 4";
        
        $sqlstmt = $this->dbconn->prepare($sql);

        $sqlstmt->execute();
        $result=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>