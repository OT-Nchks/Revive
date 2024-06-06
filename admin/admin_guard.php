<?php

if(!isset($_SESSION["adminonline"])){
    $_SESSION["admin_errormessage"]="You must be logged in to access to the page";
    header("location:index.php");
    exit();
}
?>