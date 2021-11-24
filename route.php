<?php

require_once "Controller/VinosController.php";
require_once "Controller/LoginController.php";


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

$vinosController = new VinosController();
$loginController = new LoginController();


switch ($params[0]) {
    case 'signIn':
        $loginController->signIn();
        break;
    case 'logOut':
        $loginController->logout();
        break;
    case 'login':
        $loginController->login();
        break;
    case 'otorgarPermisos':
        $loginController->ascenderUsuario($params[1]);
        break;
    case 'quitarPermisos':
        $loginController->quitarPermisos($params[1]);
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
    case 'panelAdmin':
        $loginController->adminPanel();
        break;
    case 'deleteUser':
        $loginController->deleteUser($params[1]);
        break;
    case 'home':
        $vinosController->showHome();
        break;
    case 'vino':
        $vinosController->showVino($params[1]);
        break;
    case 'bodegas':
        $vinosController->showBodegas();
        break;
    case 'createVino':
        $vinosController->createVino();
        break;
    case 'createBodega':
        $vinosController->createBodega();
        break;
    case 'deleteVino':
        $vinosController->deleteVino($params[1]);
        break;
    case 'updateVino':
        $vinosController->updateVino($params[1]);
        break;
    case 'bodega':
        $vinosController->showVinosEnBodega($params[1]);
        break;
    case 'updateBodega':
        $vinosController->updateBodega($params[1]);
        break;
    case 'deleteBodega':
        $vinosController->deleteBodega($params[1]);
        break;


    default:
        echo 'pagina no encontrada';
        break;
}
