<?php

require_once'Model/BodegasModel.php';
require_once'View/BodegasView.php';

    class bodegasController{

        private $model;
        private $view;

        function __construct()
        {
            $this->model = new bodegasModel();
            $this->view = new bodegasView();
        }

        function showBodegas(){

            $bodegas = $this->model->getBodegas();
            $this->view->showBodegas($bodegas);
        }

        function insertarBodegas(){

            $this->model->insertBodegas($_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
            $this->showBodegas();
        }
        
    }