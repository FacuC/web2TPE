<?php

    require_once'Controller/VinosController.php';
    require_once'Controller/bodegasController.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    if(!empty($_GET['action'])){
        $action = $_GET['action']; 
    }else{
        $action = 'home';
    }

    $params = explode('/', $action);
    $VinoControl = new VinosController();
    $bodegasControl = new bodegasController();

    switch ($params[0]) {
        case 'home':
            $VinoControl->showHome();
            break;
        case 'vino':
            $VinoControl->showVino($params[1]);
            break;
        case 'bodegas':
            $bodegasControl->showBodegas();
            break;
        case 'bodega':
            $VinoControl->showVinosEnBodega($params[1]);
            break; 
        case 'createVino': 
            $VinoControl->createVino(); 
            break;
        case 'createBodega': 
            $bodegasControl->insertarBodegas(); 
            break;
        case 'deleteVino': 
            $VinoControl->deleteVino($params[1]); 
            break;
         case 'updateTask': 
            $VinoControl->updateVino($params[1]); 
            break;
              
        default:
           echo 'pagina no encontrada';
            break;
    }



