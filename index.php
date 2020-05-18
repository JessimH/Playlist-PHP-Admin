<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<?php

if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'album' :
            require 'controllers/albumController.php';
            break;

        case 'artist' :
            require 'controllers/artistController.php';
            break;

        case 'song' :
            require 'controllers/songController.php';
            break;

        case 'label' :
            require 'controllers/labelController.php';
            break;
          

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;
