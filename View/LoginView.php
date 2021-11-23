<?php
require_once './Libs/smarty/libs/Smarty.class.php';
require_once "./Helpers/AuthHelper.php";

class LoginView
{

    private $smarty;
    private $authHelper;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
        $this->authHelper->verify();
    }

    function showLogin($error = "")
    {
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function showSignIn($error = "")
    {
        $this->smarty->assign('titulo', 'Sign In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/signin.tpl');
    }

    function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }

    function mostrarPanelAdmin($users, $error = "")
    {
        $this->smarty->assign('titulo', 'Panel de administrador');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/panel.tpl');
    }
}
