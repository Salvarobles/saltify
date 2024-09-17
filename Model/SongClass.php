<?php

class Song {
    
    private $id, $title, $author, $duration, $mp3, $idUser;

    public function __construct ($datos) {
        $this-> id = $datos['id'];
        $this-> title = $datos['title'];
        $this-> author = $datos['author'];
        $this-> duration = $datos['duration'];
        $this-> mp3 = $datos['mp3'];

        $this-> idUser = UserRepository::getIdUser($datos['idUser']);
    }

    public function getId() {
        return $this->id;
    } 

    public function setId($value) {
        return $this->id = $value;
    }
    
    public function getTitle() {
        return $this->title;
    } 

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($value) {
        return $this->author = $value;
    }

    public function getDuration() {
        return $this->duration;
    } 

    public function setDuration($value) {
        return $this->duration = $value;
    }

    public function getMp3() {
        return $this->mp3;
    } 

    public function setMp3($value) {
        return $this->mp3 = $value;
    }

    public function getUser() {
        return $this->idUser;
    }
}

?>