<?php

require_once './Libs/smarty/libs/Smarty.class.php';


class BodegasView
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showBodegas($bodegas)
    {
        $this->smarty->assign('titulo', "Bodegas");
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->display('Templates/bodegas.tpl');
    }

    function showError()
    {
        $this->smarty->display('Templates/bodegaError.tpl');
    }
}
