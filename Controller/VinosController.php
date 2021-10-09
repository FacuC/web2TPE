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
        $bodegas = $this->modelBodegas->getBodegas();
        $vinos = $this->model->getVinos();
        $this->view->showVinos($vinos, $bodegas);
    }

    function showVino($id)
    {
        $vino = $this->model->getVino($id);
        $bodegas = $this->modelBodegas->getBodegas();
        $this->view->showVino($vino, $bodegas);
    }

    function showVinosEnBodega($id_bodega)
    {
        $bodega = $this->modelBodegas->getBodega($id_bodega);
        $vinos = $this->model->getVinosEnBodega($id_bodega);
        $this->view->showVinosEnBodega($vinos, $bodega);
    }

    function createVino()
    {
        $this->authHelper->checkLoggedIn();
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
        $this->model->updateVino($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
        $this->showVino($id);
    }

    // -----------BODEGAS-----------


    function showBodegas()
    {
        $bodegas = $this->modelBodegas->getBodegas();
        $this->viewBodegas->showBodegas($bodegas);
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
