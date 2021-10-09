<?php
    require_once'librerias/smarty-3.1.39/libs/Smarty.class.php';
    class VinosView{

        private $smarty;
        
        function __construct(){
           $this->smarty = new Smarty();
        }
       
    function showVinos($vinos,$bodegas,$logueado,$usuario){

        $this->smarty->assign('titulo','SpeakEasy');
        $this->smarty->assign('Bebidas','Bebidas');
        $this->smarty->assign('Precios','Precios');
        $this->smarty->assign('vinos',$vinos);
        $this->smarty->assign('bodegas',$bodegas);
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('./templates/vinos.tpl');
    }

    function showVino($vino,$bodegas,$logueado,$usuario){
        $this->smarty->assign('titulo','SpeakEasy');
        $this->smarty->assign('bodegas',$bodegas);
        $this->smarty->assign('vino',$vino);
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('./templates/vino.tpl');
        
    }

    function showVinosEnBodega($vinos,$bodega,$logueado,$usuario){
 
        $this->smarty->assign('titulo','SpeakEasy');
        $this->smarty->assign('vinos',$vinos);
        $this->smarty->assign('bodega',$bodega);
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('./templates/vinosEnBodega.tpl');
    }
}
?>