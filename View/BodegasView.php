<?php
require_once'./librerias/smarty-3.1.39/libs/Smarty.class.php';
    class BodegasView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }
    
    function showbodegas($bodegas,$logueado,$usuario){

        $this->smarty->assign('titulo','SpeakEasy');
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('bodegas',$bodegas);
        $this->smarty->assign('logueado',$logueado);
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('./templates/bodegas.tpl');
    }

    function showError(){

        $this->smarty->assign('titulo','SpeakEasy');
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('error','no puedes borrar la bodega ya que tiene vinos');
        $this->smarty->display('./templates/errorEnBodega.tpl');
    }
  }    
