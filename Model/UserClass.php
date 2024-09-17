<?php

class User {
    
    private $id, $name, $rol;

    // Funcion constructura de Usuario
    public function __construct ($datos) {
        $this-> id = $datos['id'];
        $this-> name = $datos['name'];
        $this-> rol = $datos['rol'];
    }
    
    // GETTERS Y SETTERS
    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getRol() {
        return $this->rol;
    }

    public function setRol($value) {
        $this->rol = $value;
    }
}

?>