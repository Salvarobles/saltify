<?php

class PlayListRepository {

    public static function addList($title){
        $bd = Conectar::conexion();
        $comprobar = "SELECT * FROM playlist WHERE title = '".$title."'";

        $listTitles = $bd -> query($comprobar);

        if ($listTitles ->num_rows == 0 ) {
            $q = "INSERT INTO playlist VALUES(NULL, '".$title."','".$_SESSION['user']->getId()."')";
            $result = $bd->query($q);
            return "Lista creada";
        } else {
            return "Lista existente";
        }
    }

    public static function getPlaylistById($id) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE id = ".$id;
        $result = $bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new Playlist($datos);
        } else {
            return NULL;
        }
    }

    public static function getPlaylistsByUser($u) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE idUser = '".$u->getId()."'";
        $result = $bd->query($q);
        $playlists = [];
        
        while($datos=$result->fetch_assoc()) {
            $playlists[] = new Playlist($datos);
        }
            return $playlists;
    }

    public static function getPLayListSong($idPlaylist){
        $bd = Conectar::conexion();
        $q = "SELECT idSong FROM playlistsong WHERE idPlaylist = '".$idPlaylist."'";
        $result = $bd->query($q);
        $playlistsong = [];

        while ($datos=$result->fetch_assoc()){
            $dato = implode(" ", $datos);
            $q2 = "SELECT * FROM song WHERE id = ".$dato;
            $result2 = $bd->query($q2);
            while ($datos2=$result2->fetch_assoc()){
                $playlistsong[] = new Song($datos2);
            }
        }
        return $playlistsong;
    }

}

?>