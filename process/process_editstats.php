<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/sanitizer.php";
require_once "../classes/Stats.php";

if (isset($_POST['editstatBtn'])) {

    $wellbeing = isset($_POST["quest1"]) ? $_POST["quest1"] : 1;
   $sleephabits1 = isset($_POST["quest2"]) ? $_POST["quest2"] : 1;
   $sleephabits2 = isset($_POST["quest3"]) ? $_POST["quest3"] : 1;
   $stress_level = isset($_POST["quest4"]) ? $_POST["quest4"] : 1;
   $medical_conditions = isset($_POST["quest5"]) ? $_POST["quest5"] : 1;
   $medical_notes = sanitizer($_POST["quest5b"]);
    $id=$_POST['id'];

        $stat = new Stats();
        $chk = $stat->update_stats($wellbeing, $sleephabits1, $sleephabits2, $stress_level,$medical_conditions, $medical_notes, $id);

        // var_dump($chk);
        // die();
        
        if($chk){ //if correct
            header("location:../php/statsprofile.php");
            exit();
        }else{
            header("location:../php/editstatsprofile.php");
            exit();
        }
    }
    
else{
    $_SESSION['errormessage'] = "please complete the form";
    header("location:../php/editstatsprofile.php");
    exit();
}

?>