<?php
session_start();
require_once "classes/Blog.php";


    if(isset($_GET["id"])){
        $id=$_GET["id"];
       /* echo $id;
   */}
    $delete1=new Blog();
    $result=$delete1->delete_blogs($id);

    if($result){
        $_SESSION["admin_feedback"]="Blog with id: $id ,deleted successfully!";
        header("location: admin_bloglist.php");
        exit();
    }
    else{
        $_SESSION["admin_feedback"]="Unable to delete Blog";
        header("location: admin_bloglist.php");
        exit();
    } 


?>