<?php

require_once 'Libs/Router.php';
require_once 'Controller/ApiComentarioController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('comentarios/vino/:ID', 'GET', 'ApiComentarioController', 'getComentariosVino');
$router->addRoute('comentarios/vino/:ID', 'POST', 'ApiComentarioController', 'insertarComentario');
$router->addRoute('comentarios/deleteComment/:ID', 'DELETE', 'ApiComentarioController', 'deleteComment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
