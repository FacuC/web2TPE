<?php

require_once './Libs/smarty/libs/Smarty.class.php';
require_once "./Helpers/AuthHelper.php";

class VinosView
{
    private $smarty;
    private $authHelper;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
        $this->authHelper->verify();
    }

    function showVinos($vinos, $bodegas, $error = null)
    {
        $this->smarty->assign('titulo', "Home");
        $this->smarty->assign('vinos', $vinos);
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates/vinos.tpl');
    }

    function showVino($vino, $bodegas)
    {
        $this->smarty->assign('titulo', $vino->nombre);
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->display('Templates/vino.tpl');
    }

    function showVinosEnBodega($vinos, $bodega, $error = null)
    {
        $this->smarty->assign('titulo', $bodega->nombre);
        $this->smarty->assign('vinos', $vinos);
        $this->smarty->assign('bodega', $bodega);
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates/vinosEnBodega.tpl');
    }

    function noExiste()
    {
        $this->smarty->assign('titulo', "error 404");
        $this->smarty->display('Templates/error404.tpl');
    }
}
