
<?php
require_once "Db.php";

class Tracks extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }


#METHOD TO FETCH TRACKS
    public function fetch_tracks(){
    $sql = "SELECT tracks.*, category.cat_name, playlists.playlist_name FROM tracks JOIN category ON tracks.track_catid = category.cat_id JOIN playlists ON tracks.track_playlstid = playlists.playlist_id";
    
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute();
        $records = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }





  #METHOD TO UPLOAD TRACKS

    public function add_tracks($playlistname, $name, $artist, $trackimageFile, $audio, $duration, $category)
    {
        try {
            // Insert playlist name into playlists table
            $sql = "INSERT INTO playlists(playlist_name) VALUES (?)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $result = $sqlstmt->execute([$playlistname]);
    
            if (!$result) {
                // Error handling if playlist insertion fails
                $_SESSION["admin_errormessage"] = "Failed to create playlist";
                return false;
            }
    
            // Get the playlist id of the newly inserted playlist
            $playlistid = $this->dbconn->lastInsertId();
    
            // Insert track details into tracks table
            $sql = "INSERT INTO tracks(track_playlstid, track_name, track_artist, track_image, track_audio, track_duration, track_catid) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $sqlstmt = $this->dbconn->prepare($sql);
            $result = $sqlstmt->execute([$playlistid, $name, $artist, $trackimageFile, $audio, $duration, $category]);
    
            if ($result) {
                $_SESSION["admin_feedback"] = "$name uploaded successfully!";
            } else {
                $_SESSION["admin_errormessage"] = "Failed to upload track";
            }
    
            return $result;
        } catch (PDOException $error) {
            // Error handling for database errors
            $_SESSION["admin_errormessage"] = $error->getMessage();
            return false;
        }
    }



    #METHOD TO DELETE ANY TRACK FROM THE LIST

    public function delete_tracks($track_id) {
        try {
            // Begin transaction
            $this->dbconn->beginTransaction();
    
            // Get the playlist ID associated with the track
            $sql = "SELECT track_playlstid FROM tracks WHERE track_id=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$track_id]);
            $playlist_id = $sqlstmt->fetchColumn();
    
            // Delete the track
            $sql = "DELETE FROM tracks WHERE track_id=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$track_id]);
    
            // Check if there are any more tracks in the playlist
            $sql = "SELECT COUNT(*) FROM tracks WHERE track_playlstid=?";
            $sqlstmt = $this->dbconn->prepare($sql);
            $sqlstmt->execute([$playlist_id]);
            $track_count = $sqlstmt->fetchColumn();
    
            // If no more tracks are in the playlist, delete the playlist
            if ($track_count == 0) {
                $sql = "DELETE FROM playlists WHERE playlist_id=?";
                $sqlstmt = $this->dbconn->prepare($sql);
                $sqlstmt->execute([$playlist_id]);
            }
    
            // Commit transaction
            $this->dbconn->commit();
            return true;
        } catch (Exception $e) {
            // Rollback transaction if something goes wrong
            $this->dbconn->rollBack();
            return false;
        }
    }



#METHOD TO GET TRACK (FROM DB) THROUGH ITS ID
    public function get_track_by_id($track_id){
        $sql = "SELECT * FROM  tracks JOIN playlists ON track_playlstid=playlist_id  WHERE track_id=?";
        #preparing your statment
        $sqlstmt = $this->dbconn->prepare($sql);
        $sqlstmt->execute([$track_id]);
        $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


#METHOD TO UPDATE ANY TRACK
public function update_tracks($pname, $name, $artist, $duration, $category, $track_id, $playlist_id) {
    try {
        // Update the playlist name
        $sql = "UPDATE playlists SET playlist_name=? WHERE playlist_id=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $result = $sqlstmt->execute([$pname, $playlist_id]);

        if (!$result) {
            throw new PDOException("Failed to update playlist.");
        }

        // Update the track with the provided playlist ID
        $sql = "UPDATE tracks SET track_name=?, track_artist=?, track_duration=?, track_catid=? WHERE track_id=?";
        $sqlstmt = $this->dbconn->prepare($sql);
        $result = $sqlstmt->execute([$name, $artist, $duration, $category, $track_id]);

        return $result;
    } catch (PDOException $error) {
        // Error handling for database errors
        $_SESSION["admin_errormessage"] = $error->getMessage();
        return false;
    }
}



}
