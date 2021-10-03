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
        $this->smarty->assign('bodegas', $bodegas);
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->display('Templates/bodegas.tpl');
    }

    function showError()
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->display('Templates/bodegaError.tpl');
    }
}
