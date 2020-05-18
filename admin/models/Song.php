<?php

function getAllSongs()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM songs');
    $songs =  $query->fetchAll();

    return $songs;
}

function getSong($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');
    $query->execute(
        [
            $id
        ]
    );

    $result =  $query->fetch();

    return $result;
}

function addSong($informations)
{
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO songs (title, artist_id, album_id) VALUES( :title, :artist_id, :album_id)');
    $result = $query->execute(
        [
            'title' => $informations['title'],
            'artist_id' => $informations['artist_id'],
            'album_id' => $informations['album_id'],
        ]
    );

    return $result;
}

function deleteSong($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM songs WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}

function updateSong($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE songs SET title = ?, artist_id = ?, album_id = ? WHERE id = ?');
    $result = $query->execute(
        [
            $informations['title'],
            $informations['artist_id'],
            $informations['album_id'],
            $id
        ]
    );

    return $result;
}