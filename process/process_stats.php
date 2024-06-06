<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Stats.php";

// Check if the form is submitted
if(isset($_POST["statBtn"])) { 

   $wellbeing = isset($_POST["quest1"]) ? $_POST["quest1"] : 1;
   $sleephabits1 = isset($_POST["quest2"]) ? $_POST["quest2"] : 1;
   $sleephabits2 = isset($_POST["quest3"]) ? $_POST["quest3"] : 1;
   $stress_level = isset($_POST["quest4"]) ? $_POST["quest4"] : 1;
   $medical_conditions = isset($_POST["quest5"]) ? $_POST["quest5"] : 1;
   $medical_notes = $_POST["quest5b"];

   $error=[];
   
    if(empty($wellbeing)){
        array_push($error, "Please select an option");
    }
    if(empty($sleephabits1)){
        array_push($error, "Please select an option");
    }
    if(empty($sleephabits2)){
        array_push($error, "Please select an option");
    }
    if(empty($stress_level)){
        array_push($error, "Please select an option");
    }
    if(empty($medical_conditions)){
        array_push($error, "Please select an option");
    }
  
    if($error){
        $_SESSION['errormessage'] = $error;
        header("location: ../php/statsprofile.php"); 
        exit();
    }
    else{
        $stat = new Stats();
        $result = $stat->insert_assessment($wellbeing, $sleephabits1, $sleephabits2, $stress_level, $medical_conditions, $medical_notes, $_SESSION['useronline']);

        if($result){ 
            header("location: ../php/profiletab.php"); 
            exit();
        }

    }

}
?>
