<?php

    require_once'Controller/VinosController.php';
    require_once'Controller/loginController.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    if(!empty($_GET['action'])){
        $action = $_GET['action']; 
    }else{
        $action = 'home';
    }

    $params = explode('/', $action);
    $VinoControl = new VinosController();
    $loginController = new LoginController();

    switch ($params[0]) {
        case 'signIn':
            $loginController->signIn(); 
            break;
        case 'login': 
            $loginController->login();//helper me manda aqui si hago algo que no puedo
            break;
        case 'logout': 
            $loginController->logout(); 
            break;
        case 'verify': 
            $loginController->verifyLogin(); 
            break;
        case 'verifySignIn': 
            $loginController->verifySignIn(); 
            break;
        case 'home':
            $VinoControl->showHome();
            break;
        case 'vino':
            $VinoControl->showVino($params[1]);
            break;
        case 'bodegas':
            $VinoControl->showBodegas();
            break;
        case 'bodega':
            $VinoControl->showVinosEnBodega($params[1]);
            break; 
        case 'createVino': 
            $VinoControl->createVino(); 
            break;
        case 'createBodega': 
            $VinoControl->insertarBodegas(); 
            break;
        case 'deleteVino': 
            $VinoControl->deleteVino($params[1]); 
            break;
         case 'updateVino': 
            $VinoControl->updateVino($params[1]); 
            break;  
        case 'deleteBodegas': 
            $VinoControl->deleteBodega($params[1]); 
            break;
        case 'updateBodega': 
            $VinoControl->updateBodega($params[1]); 
            break;          
        default:
           echo 'pagina no encontrada';
            break;
    }



