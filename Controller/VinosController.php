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

    function showHome($error = null)
    {
        $bodegas = $this->modelBodegas->getBodegas();
        $vinos = $this->model->getVinos();
        $this->view->showVinos($vinos, $bodegas, $error);
    }

    function showVino($id)
    {
        $vino = $this->model->getVino($id);

        if (!empty($vino)) {
            $bodegas = $this->modelBodegas->getBodegas();
            $this->view->showVino($vino, $bodegas);
        } else {
            $this->view->noExiste();
        }
    }

    function buscarVino()
    {

        $this->authHelper->checkLoggedIn();

        if (isset($_GET["nombre"]) && $_GET["nombre"] != "") {
            $nombre = "%" . $_GET["nombre"] . "%";
        } else {
            $nombre = "%";
        }

        if (isset($_GET["descripcion"]) && $_GET["descripcion"] != "") {
            $descripcion = "%" . $_GET["descripcion"] . "%";
        } else {
            $descripcion = "%";
        }
        if (isset($_GET["precio"]) && $_GET["precio"] != "") {
            $precio = $_GET["precio"];
        } else {
            $precio = "%";
        }
        if (isset($_GET["bodega"]) && $_GET["bodega"] != "" && $_GET["bodega"] != "any") {
            $bodega = $_GET["bodega"];
        } else {
            $bodega = "%";
        }

        $bodegas = $this->modelBodegas->getBodegas();
        $vinos = $this->model->buscarVinos($nombre, $descripcion, $precio, $bodega);
        $this->view->showVinos($vinos, $bodegas);
    }

    function showVinosEnBodega($id_bodega, $error = null)
    {
        $bodega = $this->modelBodegas->getBodega($id_bodega);

        if (!empty($bodega)) {
            $vinos = $this->model->getVinosEnBodega($id_bodega);
            $this->view->showVinosEnBodega($vinos, $bodega, $error);
        } else {
            $this->view->noExiste();
        }
    }

    function createVino()
    {
        $this->authHelper->checkAdmin();
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
            if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['descripcion']) && $_POST['descripcion'] != "" && isset($_POST['precio']) && $_POST['precio'] != "" && isset($_POST['bodega']) && $_POST['bodega'] != "") {
                $filePath = "img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath);
                $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega'],  $filePath);
                $this->showHome();
            } else {
                $this->showHome("Faltan valores");
            }
        } else {
            if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['descripcion']) && $_POST['descripcion'] != "" && isset($_POST['precio']) && $_POST['precio'] != "" && isset($_POST['bodega']) && $_POST['bodega'] != "") {
                $this->model->insertVino($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
                $this->showHome();
            } else {
                $this->showHome("Faltan valores");
            }
        }
    }
    function deleteVino($id)
    {
        $this->authHelper->checkAdmin();
        $vino = $this->model->getVino($id);
        if (!empty($vino)) {
            if (!($vino->imagen == "img/vinoEjemplo.png")) { //no borrar la imagen de muestra
                unlink($vino->imagen); //borrar imagen
            }
            $this->model->deleteVino($id);
            $this->showHome();
        } else {
            $this->view->noExiste();
        }
    }

    function updateVino($id)
    {
        $this->authHelper->checkAdmin();
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
            if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['descripcion']) && $_POST['descripcion'] != "" && isset($_POST['precio']) && $_POST['precio'] != "" && isset($_POST['bodega']) && $_POST['bodega'] != "") {
                $filePath = "img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath);

                $vino = $this->model->getVino($id);

                if (!($vino->imagen == "img/vinoEjemplo.png")) { //no borrar la imagen de muestra
                    unlink($vino->imagen); //borrar imagen anterior
                }

                $this->model->updateVino($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega'],  $filePath);
            }
        } else {
            if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['descripcion']) && $_POST['descripcion'] != "" && isset($_POST['precio']) && $_POST['precio'] != "" && isset($_POST['bodega']) && $_POST['bodega'] != "") {
                $this->model->updateVino($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['bodega']);
            }
        }
        $this->showVino($id);
    }

    // -----------BODEGAS-----------


    function showBodegas($error = null)
    {

        $bodegas = $this->modelBodegas->getBodegas();
        $this->viewBodegas->showBodegas($bodegas, $error);
    }

    function createBodega()
    {
        $this->authHelper->checkAdmin();
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['ubicacion']) && $_POST['ubicacion'] != "" && isset($_POST['contacto']) && $_POST['contacto'] != "") {
            $this->modelBodegas->createBodega($_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
            $this->showBodegas();
        } else {
            $this->showBodegas("Faltan valores");
        }
    }

    function deleteBodega($id)
    {
        $this->authHelper->checkAdmin();
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
        $this->authHelper->checkAdmin();
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && isset($_POST['ubicacion']) && $_POST['ubicacion'] != "" && isset($_POST['contacto']) && $_POST['contacto'] != "") {
            $this->modelBodegas->updateBodega($id, $_POST['nombre'], $_POST['ubicacion'], $_POST['contacto']);
            $this->showVinosEnBodega($id);
        } else {
            $this->showVinosEnBodega($id, "faltan valores");
        }
    }
}
