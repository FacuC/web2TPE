<?php
    require_once'librerias/smarty-3.1.39/libs/Smarty.class.php';
    class VinosView{

        private $smarty;
        
        function __construct(){
           $this->smarty = new Smarty();
        }
       
    function showVinos($vinos,$bodegas){

        $this->smarty->assign('titulo','Casa Viñedos');
        $this->smarty->assign('Bebidas','Bebidas');
        $this->smarty->assign('Precios','Precios');
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('vinos',$vinos);
        $this->smarty->assign('bodegas',$bodegas);
        $this->smarty->display('./templates/vinos.tpl');
    }

    function showVino($vino){
        $this->smarty->assign('titulo','Casa Viñedos');
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('vino',$vino);
        $this->smarty->display('./templates/vino.tpl');
        
    }

    function showVinosEnBodega($vinos){
        if (count($vinos)>0) {
            $this->smarty->assign('bodega',$vinos[0]->bodega);
        }else{
            $this->smarty->assign('bodega','Esta bodega no tiene vinos');
        }
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('vinos',$vinos);
        $this->smarty->display('./templates/vinosEnBodega.tpl');
    }
}
?>