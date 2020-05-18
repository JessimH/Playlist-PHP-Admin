<?php

require('./models/Album.php');
require('./models/Artist.php');

switch ($_GET['action']){
    case 'list' :
        $albums = getAllAlbums();
        require('views/albumList.php');
        break;

    case 'new' :
        $artists = getAllArtists();
        require('views/albumForm.php');
        break;

    case 'add' :
        if(empty($_POST['name']) || empty($_POST['artist_id']) || empty($_POST['year'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            elseif(empty($_POST['artist_id'])){
                $_SESSION['messages'][] = 'Le nom de l\'artiste est obligatoire !';
            }
            if(empty($_POST['year'])){
                $_SESSION['messages'][] = 'L\'année de sortie est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=albums&action=new');
            exit;
        }
        else{
            $resultAdd = addAlbum($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Album enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, l\'album n\'a pas pus être ajouté...";
            }
            header('Location:index.php?controller=albums&action=list');
            exit;
        }
        break;

    case 'edit' :
        if(!empty($_POST)){
            if(empty($_POST['name']) || empty($_POST['artist_id']) || empty($_POST['year'])){

                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le nom est obligatoire !';
                }
                if(empty($_POST['artist_id'])){
                    $_SESSION['messages'][] = 'Le nom de l\'artiste est obligatoire !';
                }
                if(empty($_POST['year'])){
                    $_SESSION['messages'][] = 'L\'année de sortie est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=albums&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                $result = updateAlbum($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Album mis à jour !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur,  l\'album n\'a pas pus être modifié...';
                }
                header('Location:index.php?controller=albums&action=list');
                exit;
            }
        }

        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $album = getAlbum($_GET['id']);
                    if($album == false){
                        header('Location:index.php?controller=albums&action=list');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }
            }
            $artists = getAllArtists();
            require('views/albumForm.php');
        }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteAlbum($_GET['id']);
        }
        else {
            $_SESSION['messages'][] = 'pk tu touches aux URL? tu me fait pas confiance?! arrete de jouer et utilise mes boutons!';
            header('Location:index.php?controller=albums&action=list');
            exit;
        }
        if($result){
            $_SESSION['messages'][] = 'Album bien supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur, l\'album n\'a pas pus être supprimé...';
        }
        header('Location:index.php?controller=albums&action=list');
            exit;
        break;
    
    default :
        require 'controllers/indexController.php';

}
