<?php 

class Playlist {
    
    private $id, $title, $duration, $idUser, $songs;

    //Funcion contructura
    public function __construct ($datos) {
        $this-> id = $datos['id'];
        $this-> title = $datos['title'];
        $this-> idUser = UserRepository::getIdUser($datos['idUser']);
        $this-> songs = SongRepository::getSongByPlaylist($datos['id']);
    }

    //GETTERS Y SETTERS
    
    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this -> id=$value;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($value){
        $this -> title=$value;
    }

    public function getUser(){
        return $this->idUser;
    }

    public function getSongs(){
        return $this->songs;
    }
}
?>