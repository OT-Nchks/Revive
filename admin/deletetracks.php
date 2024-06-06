<?php
session_start();
require_once "classes/Playlists.php";
require_once "classes/Tracks.php";

if (isset($_GET['id'])) {
    $no = $_GET['id'] ;
    $delete = new Playlists();
    $result = $delete->delete_playlists($id);
}
    if(isset($_GET["id"])){
        $id=$_GET["id"];
       /* echo $id;
   */}
    $delete1=new Tracks();
    $result=$delete1->delete_tracks($id);

    if($result){
        $_SESSION["admin_feedback"]="Track with id: $id ,deleted successfully!";
        header("location: admin_playlist.php");
        exit();
    }
    else{
        $_SESSION["admin_feedback"]="Unable to delete Track";
        header("location: admin_playlist.php");
        exit();
    } 


?>