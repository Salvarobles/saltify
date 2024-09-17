<?php

// Cargar modelos
require_once('bd.php');

require_once('Model/UserClass.php');
require_once('Model/SongClass.php');
require_once('Model/PlaylistClass.php');

require_once('Model/UserRepository.php');
require_once('Model/SongRepository.php');
require_once('Model/PlaylistRepository.php');

session_start();

//Cargar vistas


if (!empty($_GET['link'])){

    if ($_GET['link'] == "user"){
        require_once('Controller/userController.php');
    }

    if ($_GET['link'] == "song"){
        require_once('Controller/songController.php');
    }

    if ($_GET['link'] == "playlist"){
        require_once('Controller/playlistController.php');
    }
}

if (isset($_POST['buscar'])) {
    $songs = SongRepository::getSongFilter($_POST['search']);
} else {
    $songs = SongRepository::getSongs();
}

include ('View/mainView.phtml');
?>