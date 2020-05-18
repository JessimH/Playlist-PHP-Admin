<?php

require('models/Label.php');
require('models/Artist.php');
require('models/Album.php');

switch ($_GET['action']){
    case 'list' :
        $labels = getAllLabels();
        require('views/labelList.php');
        break;

    case 'new' :
        $labels = getAllLabels();
        require('views/labelForm.php');
        break;

    case 'add' :
        if(empty($_POST['name'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
    
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=labels&action=new');
            exit;
        }
        else{
            $resultAdd = addLabel($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Label enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, le label n\'a pas pus être ajouté...";
            }
            header('Location:index.php?controller=labels&action=list');
            exit;
        }
        break;

    case 'edit' :
        if(!empty($_POST)){
            if(empty($_POST['name'])){

                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le nom est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=labels&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                $result = updateLabel($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Label modifié!';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur, le label n\'a pas pus être modifié...';
                }
                header('Location:index.php?controller=labels&action=list');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $label = getLabel($_GET['id']);
                    if($label == false){
                        header('Location:index.php?controller=labels&action=list');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?controller=labels&action=list');
                    exit;
                }
            }
            $labels = getAllLabels();
            require('views/labelForm.php');
        }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteLabel($_GET['id']);
        }
        else {
            $_SESSION['messages'][] = 'pk tu touches aux URL? tu me fait pas confiance?! arrete de jouer et utilise mes boutons!';
            header('Location:index.php?controller=labels&action=list');
            exit;
        }
        if($result){
            $_SESSION['messages'][] = 'Label supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur, le label n\'a pas pus être supprimé...';
        }
        header('Location:index.php?controller=labels&action=list');
        exit;
        break;
    
    default :
        require 'controllers/indexController.php';

}