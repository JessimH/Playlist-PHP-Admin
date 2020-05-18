<?php
require 'helpers.php';

if(!isset($_GET['label_id']) || !ctype_digit($_GET['label_id'])){
  header('Location:index.php');
  exit;
}


require_once 'models/Artist.php';
require_once 'models/Label.php';



$label = getLabel($_GET['label_id']);

if($label == false){
  header('Location:index.php');
  exit;
}


$artists = getArtistsLabel($label['id']);


include 'views/label.php';
