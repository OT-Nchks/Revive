<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/config.php";
require_once "../classes/Diary.php";

$user = $_SESSION['useronline'];

// Check if the form is submitted
if(isset($_POST["diaryBtn"])) { 

   // Sanitize form data
date_default_timezone_set('Africa/Lagos'); 
 $date = date('Y-m-d H:i:s');
//    $date = $_POST["date"];
$user_id = $_POST['id'];
//print_r($_POST);
//die();
   $start = ($_POST["sleepstart"]);
   $end = ($_POST["sleepend"]);
   $notes = ($_POST["message"]);

   // Validate form fields
   $error = [];
   if((empty($date))||(empty($notes))||(empty($start))||(empty($end))){
       array_push($error, "Please fill in all fields");
   }
  

   // If there are errors, redirect back with error messages
   if($error){
       $_SESSION['user_errormessage'] = $error;
       header("location: ../php/diarytab.php?id=$user"); 
   } else {
       // If no errors, insert data into database
       $contact = new Diary();
       $result = $contact->insert_diarymsg( $date, $notes, $start, $end, $user_id);

       

       if($result){ 
           // If insertion is successful, it redirects to diarylists page
         
           header("location: ../php/diarylists.php"); 
           exit();
       } else {
           // If insertion is unsuccessful, redirect back to the same page
           $_SESSION['user_errormessage'] = "Failed to insert diary message";
           header("location: ../php/diarytab.php"); 
           exit();
       }
   }
} else { 
    // Redirect if the form is not submitted
    $_SESSION['user_errormessage'] = "Please Complete the Contact Form";
    header("location: ../php/diarytab.php"); 
    exit();
}

?>

