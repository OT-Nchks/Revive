<?php
session_start();
require_once "classes/Quotes.php";


    if(isset($_GET["id"])){
        $id=$_GET["id"];
       /* echo $id;
   */}
    $delete1=new Quotes();
    $result=$delete1->delete_quotes($id);

    if($result){
        $_SESSION["admin_feedback"]="Quote with id: $id ,deleted successfully!";
        header("location: admin_quotelist.php");
        exit();
    }
    else{
        $_SESSION["admin_feedback"]="Unable to delete Quote";
        header("location: admin_quotelist.php");
        exit();
    } 


?>