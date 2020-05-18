<?php
function getArtists($artistId = false){
    $db = dbConnect();
    if($artistId != false){
        $query = $db->prepare("SELECT * FROM artists WHERE id = ?" );
        $query->execute([$artistId]);
        $artists = $query->fetchAll();
    }
    else {
        $query = $db->query('SELECT * FROM artists ');
        $artists = $query->fetchAll();
    }
    return $artists;
}

function getArtist($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM artists WHERE id = ?');
    $result = $query->execute([$id]);
    if ($result){
        return $query->fetch();
    }
    else {                          
        return false;
    }
}

function getArtistsLabel($labelId = null){
    $db = dbConnect();
    if($labelId != false){
        $query = $db->prepare("SELECT * FROM artists WHERE label_id = ?" );
        $query->execute([$labelId]);
        $artists = $query->fetchAll();
    }
    else {
        $query = $db->query('SELECT * FROM artists ');
        $artists = $query->fetchAll();
    }
    return $artists;
}
