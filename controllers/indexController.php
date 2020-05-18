<?php
require 'helpers.php';

require_once 'models/album.php';
require_once 'models/artist.php';
require_once 'models/song.php';
require_once 'models/label.php';


$labels = getAllLabels();
$songs = getSongs();

include 'views/index.php';
