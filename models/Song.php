<?php
function getSongs($albumId = false){
    $db = dbConnect();
    if ($albumId != false){
        $query = $db->prepare('SELECT * FROM songs WHERE album_id = ?');
        $query->execute([$albumId]);
        $selectedSongs = $query->fetchAll();
    }
    else{
        $query = $db->query('SELECT * FROM songs ');
        $selectedSongs = $query->fetchAll();
    }
    return $selectedSongs;
}

function getSong($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');
    $result = $query->execute([$id]);
    if ($result){                       //Si la requête est réussie alors $result == true donc on récupère les données
        return $query->fetch();
    }
    else {                              //Si la requête est ratée alors $result == false donc on retourne false
        return false;
    }
}
