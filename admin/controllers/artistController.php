<?php 

require('models/Artist.php');
require('models/Label.php');

switch ($_GET['action']){
    case 'list' :
        $artists = getAllArtists();
        require('views/artistList.php');
        break;

    case 'new' :
        $labels = getAllLabels();
	    @require('views/artistForm.php');
        break;

    case 'add' :
        if(empty($_POST['name']) || empty($_POST['label_id']) || empty($_POST['biography'])){
		
            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['label_id'])){
                $_SESSION['messages'][] = 'Le label est obligatoire !';
            }
            if(empty($_POST['biography'])){
                $_SESSION['messages'][] = 'La biographie est obligatoire !';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=artists&action=new');
            exit;
        }
        else{
            $resultAdd = addArtist($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Artiste enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, l\'artist n\'a pas pus être ajouté...";
            }
            header('Location:index.php?controller=artists&action=list');
            exit;
        }
        break;

    case 'edit' :
    if(!empty($_POST)){
        if(empty($_POST['name']) || empty($_POST['label_id']) || empty($_POST['biography'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['label_id'])){
                $_SESSION['messages'][] = 'Le label est obligatoire !';
            }
            if(empty($_POST['biography'])){
                $_SESSION['messages'][] = 'La biographie est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=artists&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $result = updateArtist($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Artiste mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Désolé, erreur,  l\'artist n\'a pas pus être modifié...';
            }
            header('Location:index.php?controller=artists&action=list');
            exit;
        }
    }
    else{
        if(!isset($_SESSION['old_inputs'])){
            if(isset($_GET['id'])){
                $artist = getArtist($_GET['id']);
                if($artist == false){
                    header('Location:index.php?controller=artists&action=list');
                    exit;
                }
            }
            else {
                header('Location:index.php?controller=artists&action=list');
                exit;
            }
        }
        $labels = getAllLabels();
        require('views/artistForm.php');
    }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteArtist($_GET['id']);
        }
        else {
            $_SESSION['messages'][] = 'pk tu touches aux URL? tu me fait pas confiance?! arrete de jouer et utilise mes boutons!';
            header('Location:index.php?controller=artists&action=list');
            exit;
        }
        if($result){
            
            $_SESSION['messages'][] = 'Artiste supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur,  l\'artist n\'a pas pus être supprimé...';
        }
        header('Location:index.php?controller=artists&action=list');
        exit;    
        break;
    
    default :
        require 'controllers/indexController.php';
}
