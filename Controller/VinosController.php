<?php

require_once'Model/VinosModel.php';
require_once'Model/BodegasModel.php';
require_once'View/BodegasView.php';
require_once'View/VinosView.php';
require_once'Helper/AuthHelper.php';

    class VinosController{

        private $model;
        private $view;
        private $modelBodegas;
        private $viewBodegas;
        private $authHelper;

        function __construct()
        {
            $this->model = new VinosModel();
            $this->view = new VinosView();
            $this->modelBodegas = new BodegasModel();
            $this->viewBodegas = new BodegasView();
            $this->authHelper = new AuthHelper();
        }

        function showHome(){
            $logueado = false;
            $usuario ='';
            if ($this->authHelper->estaLogueado()) {
                $logueado = true; 
                $usuario = $this->authHelper->getUserName();
            }
            $bodega = $this->modelBodegas->getBodegas();
            $vinos = $this->model->getVinos();
            $this->view->showVinos($vinos,$bodega,$logueado,$usuario);
        }
        function showVino($id){//muestra un vino
            $logueado = false;
            $usuario ='';
            if ($this->authHelper->estaLogueado()) {
                $logueado = true; 
                $usuario = $this->authHelper->getUserName($logueado);
            }
            $bodegas = $this->modelBodegas->getBodegas();
            $vino = $this->model->getVino($id);
            $this->view->showVino($vino,$bodegas,$logueado,$usuario);
        }

        function showVinosEnBodega($id){// muestra los vinos de esa bodega
            $logueado = false;
            $usuario ='';
            if ($this->authHelper->estaLogueado()) {
                $logueado = true; 
                $usuario = $this->authHelper->getUserName($logueado);
            }
            $bodega = $this->modelBodegas->getBodega($id);
            $vino = $this->model->getVinosEnBodega($id);
            $this->view->showVinosEnBodega($vino,$bodega,$logueado,$usuario);
        }

        function createVino(){//creo un vino 
            
            $this->authHelper->checkLoggedIn();
            $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
            $this->showHome();
        }
    
        function deleteVino($id){
            $this->authHelper->checkLoggedIn();//is Logged In = estas registrado
            $this->model->deleteVino($id);
            $this->showHome();
           
        }
    
        function updateVino($id){
            $this->authHelper->checkLoggedIn();
    
            $this->model->updateVino($id,$_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
            $this->showHome();
        }

   ////bodegas
        function showBodegas(){

            $logueado = false;
            $usuario ='';
            if ($this->authHelper->estaLogueado()) {
                $logueado = true; 
                $usuario = $this->authHelper->getUserName($logueado);
            }
            $bodegas = $this->modelBodegas->getBodegas();
            $this->viewBodegas->showBodegas($bodegas,$logueado,$usuario);
        }

        function insertarBodegas(){

            $this->authHelper->checkLoggedIn();
            $this->modelBodegas->insertBodegas($_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
            $this->showBodegas();
           /* }
            else{
                header("Location: ".BASE_URL."login");
            }*/
        } 

        function deleteBodega($id){
            
            $this->authHelper->checkLoggedIn();
            $vinos = $this->model->getVinosEnBodega($id);

            if (count($vinos) > 0) {//si la bodega tiene vino no se puede borrar
                $this->viewBodegas->showError();
            }
            else {
                $this->modelBodegas->deleteBodegas($id);//borrala
                $this->showBodegas();
            }
        }
    
        function updateBodega($id){
            
            $this->authHelper->checkLoggedIn();
            $this->modelBodegas->updateBodegas($id,$_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
            $this->showBodegas();
        }
    }
    