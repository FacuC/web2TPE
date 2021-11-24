<?php
require_once "./Model/ComentarioModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/UserModel.php";
require_once "./Model/VinosModel.php";


class ApiComentarioController
{

    private $model;
    private $userModel;
    private $vinosModel;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new ComentarioModel();
        $this->userModel = new UserModel();
        $this->vinosModel = new VinosModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthHelper();
    }

    function obtenerComentarios($params = null)
    {
        //$idVino = $params[":ID"];
        $comentarios = $this->model->getComentarios();
        return $this->view->response($comentarios, 200);
    }

    function getComentariosVino($params = null)
    {
        $idVino = $params[":ID"];
        $vino = $this->vinosModel->getVino($idVino);
        if (!empty($vino)) {

            if (isset($_GET['sort']) && $_GET['sort'] != "" && isset($_GET['order']) && $_GET['order'] != "") {
                $orderby = $this->white_list($_GET['sort'], ['puntuacion', 'fecha'], 'invalid arguments');
                $direccion = $this->white_list($_GET['order'], ['ASC', 'DESC'], 'invalid arguments');
                if ($orderby && $direccion) {
                    $comentarios = $this->model->getComentariosOrdenados($idVino, $orderby, $direccion);
                } else {
                    return $this->view->response("Parametros invalidos", 400);
                }
            } else if (isset($_GET['puntuacion']) && $_GET['puntuacion'] != "" && $_GET['puntuacion'] > 0 && $_GET['puntuacion'] <= 5) {
                $comentarios = $this->model->getComentariosFiltrados($idVino, $_GET['puntuacion']);
            } else {
                $comentarios = $this->model->getComentariosVino($idVino);
            }
            return $this->view->response($comentarios, 200);
        } else {
            return $this->view->response("Vino no encontrado", 404);
        }
    }

    function getComentariosFiltrados($params = null)
    {
        $idVino = $params[":ID"];
        $vino = $this->vinosModel->getVino($idVino);
        if (!empty($vino)) {
            if (isset($_GET['puntuacion']) && $_GET['puntuacion'] != "" && $_GET['puntuacion'] > 0 && $_GET['puntuacion'] <= 5) {
                $comentarios = $this->model->getComentariosFiltrados($idVino, $_GET['puntuacion']);
            } else {
                return $this->view->response("parametro invalido", 400);
            }
            return $this->view->response($comentarios, 200);
        } else {
            return $this->view->response("Vino no encontrado", 404);
        }
    }

    function insertarComentario($params = null)
    {
        //$this->authHelper->checkLoggedIn();
        $idUser = $this->authHelper->getUserId();
        $userName = $this->authHelper->getUserName();
        $idVino = $params[":ID"];
        //obtengo el body del request (json)
        $body = $this->getBody();
        $vino = $this->vinosModel->getVino($idVino);
        $usuario = $this->userModel->getUser($userName);

        if (!empty($usuario)) {
            if (!empty($vino)) {
                if (isset($body->comentario) && $body->comentario != "" && isset($body->puntuacion) && $body->puntuacion != "" && $body->puntuacion > 0 && $body->puntuacion <= 5) {
                    $id = $this->model->insertComment($body->comentario, $body->puntuacion, $idVino, $idUser);
                    if ($id != 0) {
                        return $this->view->response("El comentario se insertó con el id=$id", 200);
                    } else {
                        return $this->view->response("El comentario no se pudo insertar", 500);
                    }
                } else {
                    return $this->view->response("Valores invalidos", 400);
                }
            } else {
                return $this->view->response("Vino no encontrado", 404);
            }
        } else {
            return $this->view->response("Error al verificar el usuario", 403);
        }
    }

    function deleteComment($params = null)
    {
        //$this->authHelper->checkAdmin();
        $userName = $this->authHelper->getUserName();
        $rol = $this->authHelper->isAdmin();
        $usuario = $this->userModel->getUser($userName);
        $idComment = $params[":ID"];
        $comentario = $this->model->getComentario($idComment);

        if (!empty($usuario) && $rol) {
            if ($comentario) {
                $this->model->deleteComentario($idComment);
                return $this->view->response("El comentario con el id=$idComment fue borrado", 200);
            } else {
                return $this->view->response("El comentario con el id=$idComment no existe", 404);
            }
        } else {
            return $this->view->response("Error al verificar el usuario", 401);
        }
    }

    private function white_list(&$value, $allowed)
    {
        if ($value === null) {
            return $allowed[0];
        }
        $key = array_search($value, $allowed, true);
        if ($key === false) {
            return false;
        } else {
            return $value;
        }
    }


    /*
    function obtenerTarea($params = null)
    {
        $idTarea = $params[":ID"];
        $tarea = $this->model->getTask($idTarea);
        if ($tarea) {
            return $this->view->response($tarea, 200);
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404);
        }
    }

    function eliminarTarea($params = null)
    {
        $idTarea = $params[":ID"];
        $tarea = $this->model->getTask($idTarea);

        if ($tarea) {
            $this->model->deleteTaskFromDB($idTarea);
            return $this->view->response("La tarea con el id=$idTarea fue borrada", 200);
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404);
        }
    }

    function insertarTarea($params = null)
    {
        obtengo el body del request (json)
        $body = $this->getBody();

        TODO: VALIDACIONES -> 400 (Bad Request)

        $id = $this->model->insertTask($body->titulo, $body->descripcion, $body->prioridad, false);
        if ($id != 0) {
            $this->view->response("La tarea se insertó con el id=$id", 200);
        } else {
            $this->view->response("La tarea no se pudo insertar", 500);
        }
    }

    function actualizarTarea($params = null)
    {
        $idTarea = $params[':ID'];
        $body = $this->getBody();

        TODO: VALIDACIONES -> 400 (Bad Request)

        $tarea = $this->model->getTask($idTarea);

        if ($tarea) {
            $this->model->update($idTarea, $body->titulo, $body->descripcion, $body->prioridad, $body->finalizada);
            $this->view->response("La tarea se actualizó correctamente", 200);
        } else {
            return $this->view->response("La tarea con el id=$idTarea no existe", 404);
        }
    }
*/
    /**
     * Devuelve el body del request
     */
    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
