<?php 
if (!empty($_GET['logout'])) {
    session_destroy();
    session_start();
}

if (!empty($_POST['login'])) {
    $_SESSION['user'] = UserRepository::checkLogin($_POST['name'], $_POST['password']);
}

if(!empty($_GET['registrar'])){
    include("View/registrarView.phtml");
    die();
}

if(!empty($_POST['registrarse'])) {
    $_SESSION['createUser'] = UserRepository::addUser($_POST['name'], $_POST['password']);
    header("Location:index.php?");
}

?>