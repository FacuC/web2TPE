<?php
require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->authHelper = new AuthHelper();
    }

    function logout()
    {
        $this->authHelper->logout();
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

                $this->authHelper->login($user);

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
            $this->verifyLogin();
        } else {
            $this->view->showSignIn("error");
        }
    }

    function adminPanel()
    {
        $this->authHelper->checkAdmin();
        $users = $this->model->getUsers();
        $this->view->mostrarPanelAdmin($users);
    }

    function deleteUser($id)
    {
        $this->authHelper->checkAdmin();
        $this->model->deleteUser($id);
        $this->adminPanel();
    }
}
