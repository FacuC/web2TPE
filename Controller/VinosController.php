<?php

require_once "./Model/VinosModel.php";
require_once "./Model/BodegasModel.php";
require_once "./View/VinosView.php";
require_once "./View/BodegasView.php";
require_once "./Helpers/AuthHelper.php";

class VinosController
{

    private $model;
    private $modelBodegas;
    private $view;
    private $viewBodegas;
    private $authHelper;

    function __construct()
    {
        $this->model = new VinosModel();
        $this->modelBodegas = new BodegasModel();
        $this->view = new VinosView();
        $this->viewBodegas = new BodegasView();
        $this->authHelper = new AuthHelper();
    }

    function showHome()
    {
        $logueado = false;
        $usuario = "";
        if ($this->authHelper->isLoggedIn()) {
            $logueado = true;
            $usuario = $this->authHelper->getUserName();
        }
        $bodegas = $this->modelBodegas->getBodegas();
        $vinos = $this->model->getVinos();
        $this->view->showVinos($vinos, $bodegas, $logueado, $usuario);
    }

    function showVino($id)
    {
        $logueado = false;
        $usuario = "";
        if ($this->authHelper->isLoggedIn()) {
            $logueado = true;
            $usuario = $this->authHelper->getUserName();
        }
        $vino = $this->model->getVino($id);
        $bodegas = $this->modelBodegas->getBodegas();
        $this->view->showVino($vino, $bodegas, $logueado, $usuario);
    }

    function showVinosEnBodega($id_bodega)
    {
        $logueado = false;
        $usuario = "";
        if ($this->authHelper->isLoggedIn()) {
            $logueado = true;
            $usuario = $this->authHelper->getUserName();
        }
        $bodega = $this->modelBodegas->getBodega($id_bodega);
        $vinos = $this->model->getVinosEnBodega($id_bodega);
        $this->view->showVinosEnBodega($vinos, $bodega, $logueado, $usuario);
    }

    function createVino()
    {
        $this->authHelper->checkLoggedIn();
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
            $filePath = "img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath);

            $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega'],  $filePath);
        } else
            $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);

        $this->showHome();
    }
    function deleteVino($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteVino($id);
        $this->showHome();
    }
    function updateVino($id)
    {
        $this->authHelper->checkLoggedIn();
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
            $filePath = "img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath);

            $this->model->updateVino($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega'],  $filePath);
        } else
            $this->model->updateVino($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
        $this->showVino($id);
    }

    // -----------BODEGAS-----------


    function showBodegas()
    {
        $logueado = false;
        $usuario = "";
        if ($this->authHelper->isLoggedIn()) {
            $logueado = true;
            $usuario = $this->authHelper->getUserName();
        }
        $bodegas = $this->modelBodegas->getBodegas();
        $this->viewBodegas->showBodegas($bodegas, $logueado, $usuario);
    }

    function createBodega()
    {
        $this->authHelper->checkLoggedIn();
        $this->modelBodegas->createBodega($_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
        $this->showBodegas();
    }
    function deleteBodega($id)
    {
        $this->authHelper->checkLoggedIn();
        $vinos = $this->model->getVinosEnBodega($id);

        if (count($vinos) > 0) {
            $this->viewBodegas->showError();
        } else {
            $this->modelBodegas->deleteBodega($id);
            $this->showBodegas();
        }
    }
    function updateBodega($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->modelBodegas->updateBodega($id, $_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
        $this->showBodegas();
    }
}
