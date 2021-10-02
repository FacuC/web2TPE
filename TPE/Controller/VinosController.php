<?php

require_once'Model/VinosModel.php';
require_once'Model/BodegasModel.php';
require_once'View/VinosView.php';

    class VinosController{

        private $model;
        private $view;
        private $modelBodegas;

        function __construct()
        {
            $this->model = new VinosModel();
            $this->modelBodegas = new BodegasModel();
            $this->view = new VinosView();
        }

        function showHome(){

            $bodega = $this->modelBodegas->getBodegas();
            $vinos = $this->model->getVinos();
            $this->view->showVinos($vinos,$bodega);
        }
        function showVino($id){
            $vino = $this->model->getVino($id);
            $this->view->showVino($vino);
        }

        function showVinosEnBodega($id){
            $vino = $this->model->getVinosEnBodega($id);
            $this->view->showVinosEnBodega($vino);
        }

        function createVino(){
            
            $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
            $this->showHome();
        }
    
        function deleteVino($id){
            //$this->authHelper->checkLoggedIn();
    
            $this->model->deleteVinos($id);
            $this->showHome();
        }
    
        function updateVino($id){
           // $this->authHelper->checkLoggedIn();
    
            $this->model->updatevinos($id);
            $this->showHome();
        }
    
    }
    