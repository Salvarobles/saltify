<?php

if(!empty($_GET['crearLista'])) {
    include("View/crearPlaylist.phtml");
    die();
}

if(!empty($_POST['addList'])) {
    $_SESSION['crearLista'] = PlaylistRepository::addList($_POST['title']);
    header("Location:index.php?");
}

if (!empty($_GET['idPlaylist'])) {
    $playlist = PlaylistRepository::getPlaylistById($_GET['idPlaylist']);
    $songs = $playlist->getSongs();
    include("View/verCancion.phtml");
    die();
}

if(!empty($_GET['verLista'])) {
    $playlists = PlaylistRepository::getPlaylistsByUser($_SESSION['user']); 
    include("View/verPlaylist.phtml");
    die();
}







if(!empty($_GET['atras'])) {
    header("Location:index.php?");
}

?>