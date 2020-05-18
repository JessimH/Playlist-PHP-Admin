<?php

require('models/Song.php');
require('models/Artist.php');
require('models/Album.php');

switch ($_GET['action']){
    case 'list' :
        $songs = getAllSongs();
        require('views/songList.php');
        break;

    case 'new' :
        $artists = getAllArtists();
        $albums = getAllAlbums();
        require('views/songForm.php');
        break;

    case 'add' :
        if(empty($_POST['title']) || empty($_POST['artist_id']) || empty($_POST['album_id'])){

            if(empty($_POST['title'])){
                $_SESSION['messages'][] = 'Le titre est obligatoire !';
            }
            if(empty($_POST['artist_id'])){
                $_SESSION['messages'][] = 'L\' artist est obligatoire !';
            }
            if(empty($_POST['album_id'])){
                $_SESSION['messages'][] = 'L\' album est obligatoire !';
            }
    
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=songs&action=new');
            exit;
        }
        else{
            $resultAdd = addSong($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Chanson enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, la chanson n\'a pas pus être ajouté...";
            }
            header('Location:index.php?controller=songs&action=list');
            exit;
        }
        break;

    case 'edit' :
        if(!empty($_POST)){
            if(empty($_POST['title']) || empty($_POST['artist_id']) || empty($_POST['album_id'])){
    
                if(empty($_POST['title'])){
                    $_SESSION['messages'][] = 'Le titre est obligatoire !';
                }
                if(empty($_POST['artist_id'])){
                    $_SESSION['messages'][] = 'L\' artiste est obligatoire !';
                }
                if(empty($_POST['album_id'])){
                    $_SESSION['messages'][] = 'L\' album est obligatoire !';
                }
    
                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=songs&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                $result = updateSong($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Chanson modifié !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur, la chanson n\'a pas pus être modifié...';
                }
                header('Location:index.php?controller=songs&action=list');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $song = getSong($_GET['id']);
                    if($song == false){
                        header('Location:index.php?controller=songs&action=list');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?controller=songs&action=list');
                    exit;
                }
            }
            $artists = getAllArtists();
            $albums = getAllAlbums();
            require('views/songForm.php');
        }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteSong($_GET['id']);
        }
        else {
            $_SESSION['messages'][] = 'pk tu touches aux URL? tu me fait pas confiance?! arrete de jouer et utilise mes boutons!';
            header('Location:index.php?controller=artists&action=list');
            exit;
        }
        if($result){
            $_SESSION['messages'][] = 'Chanson supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur, la chanson n\'a pas pus être suppimé...';
        }
        header('Location:index.php?controller=songs&action=list');
        exit;
        break;
    
    default :
        require 'controllers/indexController.php';

}


