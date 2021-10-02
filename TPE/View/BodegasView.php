<?php
require_once'./librerias/smarty-3.1.39/libs/Smarty.class.php';
    class BodegasView{
        private $samrty;

        function __construct(){
            $this->smarty = new Smarty();
        }
        
        /*private function showHeader(){
                echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <base href="'.BASE_URL.'" />
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <title>Tareas 2021</title>
                    <a href=" home">volver</a>
                </head>
                <body>' ;          
    }

    private function showFooter(){

        echo '</body></html>';
    }*/

    function showbodegas($bodegas){
        $this->smarty->assign('titulo','Cabaña Viñedos');
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('bodegas',$bodegas);
        $this->smarty->display('./templates/bodegas.tpl');
       /* echo '<ul>';
        foreach($bodegas as $bodega) {
            
                echo '<li><a href="bodega/'.$bodega->id_bodega .'">' .  $bodega->nombre .'   ' .  $bodega->ubicacion  .'   ' .  $bodega->contacto  . '</a></li>';
       }
    
       echo '</ul>';*/
    }
  }    
