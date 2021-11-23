<?php

require_once './Libs/smarty/libs/Smarty.class.php';
require_once "./Helpers/AuthHelper.php";

class BodegasView
{
    private $smarty;
    private $authHelper;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
        $this->authHelper->verify();
    }

    function showBodegas($bodegas, $error = null)
    {
        $this->smarty->assign('titulo', "Bodegas");
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates/bodegas.tpl');
    }

    function showError()
    {
        $this->smarty->display('Templates/bodegaError.tpl');
    }
}
