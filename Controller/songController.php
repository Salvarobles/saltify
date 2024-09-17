<?php

if(!empty($_GET['crearCancion'])) {
    include("View/crearCancion.phtml");
    die();
}

if(!empty($_POST['addSong'])) {
    $archivo = $_FILES['mp3']; 
    move_uploaded_file($_FILES['mp3'] ['tmp_name'], "public/mp3/". $_FILES['mp3'] ['name']);
    SongRepository::addSong($_POST['title'], $_POST['author'], $_POST['duration'], $archivo['name']);
}
if (!empty($_GET['likeSong'])) {
    SongRepository::likeSong($_GET['idPlaylist'], $_GET['idSong']);
}

if (!empty($_GET['addPlay'])) {
    $playlist=PlaylistRepository::getPlaylistById($_GET['idPlaylist']);
    $songs = SongRepository::getSongs();
    include("View/añadirCancion.phtml");
    die();
}


if(!empty($_GET['atras'])) {
    header("Location:index.php?");
}

?>