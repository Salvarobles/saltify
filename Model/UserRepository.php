<?php 

class UserRepository {
    
    public static function checkLogin ($u, $p) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM user WHERE name = '".$u."' AND password = '".md5($p)."'";
        $result = $bd -> query($q);
        if ($datos = $result->fetch_assoc()) {
            return new User($datos);
        } else {
            return NULL;
        }
    }

    public static function getIdUser($id) {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM user WHERE id = ".$id;
        $result = $bd -> query($q);
        $users = [];
        while ($datos = $result->fetch_assoc()) {
            $users[] = new User($datos);
        }
        return $users;
    }

    public static function addUser ($u, $p) {
        $bd = Conectar::conexion();
        $comprobar = "SELECT name FROM user WHERE name = '".$u."'";
        $userNames = $bd -> query($comprobar);
        if ($userNames ->num_rows == 0 ) {
            $q = "INSERT INTO user VALUES (NULL, '".$u."','".md5($p)."', 1 )";
            $result = $bd -> query($q);
            return "Usuario creado";
        } else {
            return "Usuario existente";
        }

    }
}

?>