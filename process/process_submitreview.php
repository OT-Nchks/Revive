<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/config.php";
require_once "../classes/User.php";


// Check if the form is submitted
if(isset($_POST["revBtn"])) { 

$name = ($_POST["client_name"]);
$rating = ($_POST["review_score"]);
$message = ($_POST["message"]);

   // Validate form fields
   $error = [];
   if((empty($name))||(empty($rating))||(empty($message))){
       array_push($error, "Please fill in all fields");
   }
  

   // If there are errors, redirect back with error messages
   if($error){
       $_SESSION['user_errormessage'] = $error;
       header("location: ../php/index.php"); 
   } else {
       // If no errors, insert data into database
       $user = new User();
       $result = $user->leave_review( $name, $rating, $message);

       

       if($result){ 
           // If insertion is successful,
           echo "<script>alert('Thank You for the review!');
                                    history.back();
                        </script>";
       } else {
           // If insertion is unsuccessful, redirect back to the same page
           $_SESSION['user_errormessage'] = "Failed to insert review";
           header("location: ../php/index.php"); 
           exit();
       }
   }
} else { 
    // Redirect if the form is not submitted
    $_SESSION['user_errormessage'] = "Please Complete the Review Form";
    header("location: ../php/index.php"); 
    exit();
}

?>