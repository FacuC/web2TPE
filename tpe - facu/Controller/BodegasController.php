<?php

require_once "./Model/BodegasModel.php";
require_once "./View/BodegasView.php";


class BodegasController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new BodegasModel();
        $this->view = new BodegasView();
    }

    function showBodegas()
    {
        $bodegas = $this->model->getBodegas();
        $this->view->showBodegas($bodegas);
    }

    function createBodega()
    {
        $this->model->createBodega($_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
        $this->showBodegas();
    }
    function deleteBodega($id)
    {
        $this->model->deleteBodega($id);
        $this->showBodegas();
    }
    function updateBodega($id)
    {
        $this->model->updateBodega($id, $_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
        $this->showBodegas();
    }
}
