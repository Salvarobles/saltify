<?php

class SongRepository {

    public static function addSong($title, $author, $duration, $mp3){
        $bd = Conectar::conexion();
        $q = "INSERT INTO song VALUES(NULL, '".$title."', '".$author."', '".$duration."', '".$mp3."',".$_SESSION['user']->getId().")";
        $result = $bd->query($q);
    }

    public static function getSongs() {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM song";
        $result = $bd->query($q);
        $songs = [];
        while ($datos = $result->fetch_assoc()) {
            $songs[] = new Song($datos);
        }
        return $songs;
    }

    public static function getSongFilter($text) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM song WHERE author LIKE '%".$text."%' OR title LIKE '%".$text."%'";
        $result = $bd->query($q);
        $songs=[];
        while ($datos = $result->fetch_assoc()) {
            $songs[] = new Song($datos);
        }
        return $songs;
    }

    public static function getSongByPlaylist($idPlaylist) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM song WHERE id IN (SELECT idSong FROM playlistsong WHERE idPlaylist = '".$idPlaylist."')";
        $songs = [];
        $result = $bd->query($q);
        while($datos=$result->fetch_assoc()){
            $songs[] = new Song($datos);
        }

        return $songs;
    }

    public static function getSongsByPlaylist($idSong, $idPlaylist){
        $bd = Conectar::conexion();
        $q = "SELECT id FROM song WHERE id IN (SELECT idSong FROM playlistsong WHERE idPlaylist = '".$idPlaylist."')";
        $idSongs = [];

        $result = $bd->query($q);
        while($datos=$result->fetch_assoc()){
            $idSongs[] = $datos;
        }
        var_dump($idSongs);
        echo $idSong;

        foreach($idSongs as $idSongP){ 
            
            if ($idSongP==$idSong) {
                $idSong['state'] = 1;
            } else {
                $idSong['state'] = 0;
            }
        }
        return $idSongs;
    }


    //metodo para añadir las los enlaces.

    public static function likeSong($idPlaylist, $idSong){
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlistsong WHERE idSong = '".$idSong."' AND idPlaylist = '".$idPlaylist."'";

        $rows = $bd->query($q);

        // while ($row = $rows->fetch_assoc()) {
            if ($rows->num_rows == 0) {
                $q = "INSERT INTO playlistsong VALUES(NULL, '".$idPlaylist."', '".$idSong."')";
                $result = $bd->query($q);
            } else {
                $q = "DELETE FROM playlistsong WHERE idSong = '".$idSong."' AND idPlaylist = '".$idPlaylist."'";
                $result = $bd->query($q);  
            }
        // }
    }
}
?>