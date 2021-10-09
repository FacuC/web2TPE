<?php

require_once './Libs/smarty/libs/Smarty.class.php';

class VinosView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showVinos($vinos, $bodegas)
    {
        $this->smarty->assign('titulo', "Home");
        $this->smarty->assign('vinos', $vinos);
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->display('Templates/vinos.tpl');
    }

    function showVino($vino, $bodegas)
    {
        $this->smarty->assign('titulo', $vino->nombre);
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->display('Templates/vino.tpl');
    }

    function showVinosEnBodega($vinos, $bodega)
    {
        $this->smarty->assign('titulo', $bodega->nombre);
        $this->smarty->assign('vinos', $vinos);
        $this->smarty->assign('bodega', $bodega);
        $this->smarty->display('Templates/vinosEnBodega.tpl');
    }
}
