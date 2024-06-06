<?php
    require_once('Db.php');
    

class Music extends Db{
  
private $dbconn;

public function __construct(){
        $this->dbconn = $this->connect();
    }



    public function get_playlist_tracks($playlist_name){
        $sql = "SELECT track_id, track_name, track_artist, track_image, track_audio 
                FROM tracks 
                JOIN playlists ON tracks.track_playlstid = playlists.playlist_id 
                WHERE playlists.playlist_name = ?";
        
        // Prepare the SQL statement
        $sqlstmt = $this->dbconn->prepare($sql);
    
        // Bind the playlist_name parameter to the query
        $sqlstmt->execute([$playlist_name]);
    
        // Fetch the records
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;    
    }


    public function get_playlist_name(){
        $sql = "SELECT playlist_name FROM  playlists WHERE playlist_id=?";
        #preparing your statment
        $sqlstmt = $this->dbconn->prepare($sql);
        $result=$sqlstmt->execute();
        return $result;
    }


    public function get_all_tracks() {
        $sql = "SELECT * FROM tracks";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute();
        $tracks = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);

        return $tracks;
    }

    public function get_track_by_id($track_id) {
        $sql = "SELECT * FROM tracks WHERE track_id = ?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$track_id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    public function fetch_random_tracks(){
        $sql = "SELECT tracks.*, category.cat_name, playlists.playlist_name FROM tracks JOIN category ON tracks.track_catid = category.cat_id JOIN playlists ON tracks.track_playlstid = playlists.playlist_id ORDER BY RAND() LIMIT 10";
         
        // Prepare the SQL statement
        $sqlstmt = $this->dbconn->prepare($sql);
    
        // Bind the playlist_name parameter to the query
        $sqlstmt->execute();
    
        // Fetch the records
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;  
    }



    public function like_track($track_id, $user_id) {
        $sql = "INSERT INTO track_likes (like_trackid, like_userid) VALUES (:track_id, :user_id)";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->bindParam(':track_id', $track_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }

    public function unlike_track($track_id, $user_id) {
        $sql = "DELETE FROM track_likes WHERE like_trackid = :track_id AND like_userid = :user_id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->bindParam(':track_id', $track_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }

    public function is_track_liked($track_id, $user_id) {
        $sql = "SELECT COUNT(*) FROM track_likes WHERE like_trackid = :track_id AND like_userid = :user_id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->bindParam(':track_id', $track_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function get_user_liked_tracks($user_id) {
        $sql = "SELECT t.* FROM tracks t JOIN track_likes l ON t.track_id = l.like_trackid WHERE l.like_userid = :user_id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    }