<?php
require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";

class LoginController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    function logout()
    {
        session_start();
        session_destroy();
        $this->view->showLogin("ha cerrado sesión");
    }

    function login()
    {
        $this->view->showLogin();
    }

    //password_hash($clave, PASSWORD_BCRYPT)

    function signIn()
    {
        $this->view->showSignIn();
    }

    function verifyLogin()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['password'])) {
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];

            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($nombre);

            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {

                session_start();
                $_SESSION["nombre"] = $nombre;

                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

    function verifySignIn()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['password'])) {

            $nombre = $_POST['nombre'];
            $password = $_POST['password'];

            $this->model->createUser($nombre, $password);
            $this->view->showHome();
        } else {
            $this->view->showSignIn("error");
        }
    }
}
