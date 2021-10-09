<?php
require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";

class LoginController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin(false, '','te deslogueaste');
    }

    function login(){
    
       $this->view->showLogin(false, '');
    }

    function signIn(){
        
        $this->view->showSignIn(false,'');
    }

    function verifyLogin(){
        //si estoy ya logueado
        if (!empty($_POST['nombre']) && !empty($_POST['password'])) {
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
     
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUsuario($nombre);
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                    
                session_start();//abro la sesion
                $_SESSION["nombre"] = $nombre;//guardo la sesion del usuario
                var_dump($_SESSION);
                $this->view->showHome();//me envia al home si todo es correcto
            }
            else {
                $this->view->showLogin(false, '',"Ve a Sign In y logueate");//voy a loguearme
            }
        }
    }

    

    function verifySignIn(){//nuevo usuario

        if (!empty($_POST['nombre']) && !empty($_POST['password'])) {
            //creo el usuario
            $nombre = $_POST['nombre'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
     
            //creo el usuario que se guarda en la base de datos 
            $this->model->createUsuario($nombre,$password);
            $this->view->showLogin(false, '',"Ingrese su nuevo usuario");   
        }
        else{
            $this->view->showSignIn(false, '',"error");
        }
    }
        
}
