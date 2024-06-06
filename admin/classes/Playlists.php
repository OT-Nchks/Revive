<?php
require_once "Db.php";

class Playlists extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    #METHOD TO INSERT PLAYLIST
    public function insert_playlist($playlist_name){
        $sql="INSERT INTO playlists(playlist_name)VALUES(?)";
        $sqlstmt=$this->dbconn->prepare($sql);
        $result = $sqlstmt->execute([$playlist_name]);
        return $result;
    }

    #METHOD TO FETCH PLAYLIST CATEGORIES
    public function fetch_categories(){
        $sql = "SELECT * FROM category";
        $sqlstmt = $this->dbconn->prepare($sql);

        $sqlstmt->execute();
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }


    #METHOD TO GET PLAYLIST THROUGH ITS ID
    public function get_playlist_by_id($playlist_id){
        $sql = "SELECT * FROM  playlists WHERE playlist_id=?";
        #preparing your statment
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$playlist_id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    #METHOD TO DELETE PLAYLIST
    public function delete_playlists($playlist_id){
        $sql = "DELETE FROM  playlists WHERE playlist_id=?";

        #preparing your statment
        $sqlstmt = $this->dbconn->prepare($sql);

        $result=$sqlstmt->execute([$playlist_id]);
        return $result;
    }
}