<?php
    session_start();
    require_once ("../classes/Admin.php");


    if(isset($_POST["updateBtn"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
      

    if(empty($username) || empty($email)){
            $_SESSION['errormessage'] = "All fields are required.";
            header("location:../php/updateuser.php");
            exit();
        }

        $admin = new Admin();
        $check =  $admin -> update_admin($username, $email, $_SESSION['adminonline']);
     if($check){
        $_SESSION['feedback'] = 'profile updated!';
        header("location:../admin_profiletab.php");
        exit();
     }else{
        $_SESSION['errormessage'] = 'Something bad happened, please try again!';
        header("location:../updateadmin.php");
     }

    }else{
        $_SESSION['errormessage']  = "please complete the form!";
        header("location:../updateadmin.php");
        exit();
    }


