<?php
require_once 'librerias/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($logueado,$usuario,$error = ""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);   
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/login.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

    function showSignIn($logueado,$usuario,$error = ''){

        $this->smarty->assign('titulo', 'Sign In');
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);   
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/SignIn.tpl');
    }
}
