<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<?php

session_start();

require('../helpers.php');

if(isset($_GET['controller'])){
	switch ($_GET['controller']){
		case 'artists' :
            require 'controllers/artistController.php';
            break;
        case 'albums' :
            require 'controllers/albumController.php';
            break; 
        case 'songs' :
            require 'controllers/songController.php';
            break;
        case 'labels' :
            require 'controllers/labelController.php';
            break;
      
        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}

?>
