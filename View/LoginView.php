<?php
require_once './Libs/smarty/libs/Smarty.class.php';

class LoginView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showLogin($error = "")
    {
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('logueado', false);
        $this->smarty->assign('usuario', "");
        $this->smarty->display('templates/login.tpl');
    }

    function showSignIn($error = "")
    {
        $this->smarty->assign('titulo', 'Sign In');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('logueado', false);
        $this->smarty->assign('usuario', "");
        $this->smarty->display('templates/signin.tpl');
    }

    function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
