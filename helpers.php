<?php
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=playlist_mvc;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //affichage des erreurs
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

    return $db;

}