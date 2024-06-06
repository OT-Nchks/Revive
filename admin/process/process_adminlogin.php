<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Admin.php";

#retrieving form data and sanitize
$admin = new Admin();

if($_POST["adminloginBtn"]){ 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result= $admin->admin_login($email, $password);

    if($result ==1){ //if login details are valid, session has been set
        header("location: ../admin_dashboard.php");
        exit();
    }
    else{ //if login details are invalid, feedback already set in sessio by the method
        header("location: ../index.php");
    }
}
else{ //if the inputs are not filled
    $_SESSION['admin_errormessage'] = "Please Complete the Form";
    header("location: ../index.php"); 
}
?>
