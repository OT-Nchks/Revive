<?php
error_reporting(E_ALL);
    session_start();
    require_once ("../classes/User.php");


    if(isset($_POST["updateBtn"])){
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
      

    if(empty($fullname) || empty($email)){
            $_SESSION['errormessage'] = "All fields are required.";
            header("location:../php/updateuser.php");
            exit();
        }

        $user = new User;
        $check =  $user -> update_user($fullname, $email, $_SESSION['useronline']);
     if($check){
        $_SESSION['feedback'] = 'profile updated!';
        header("location:../php/profiletab.php");
        exit();
     }else{
        $_SESSION['errormessage'] = 'Something bad happened, please try again!';
        header("location:../php/updateuser.php");
     }

    }else{
        $_SESSION['errormessage']  = "please complete the form!";
        header("location:../php/updateuser.php");
        exit();
    }


