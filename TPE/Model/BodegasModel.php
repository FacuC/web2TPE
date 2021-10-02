<?php

    class BodegasModel{

        private $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpeweb;charset=utf8', 'root', '');
        }

        function getBodegas(){

            $sentencia = $this->db->prepare("SELECT * FROM bodegas");
            $sentencia->execute();
            $bodegas = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return  $bodegas;
        } 
        
        function insertBodegas($nombre,$ubicacion,$contacto){
            $sentencia = $this->db->prepare("INSERT INTO bodegas(nombre,ubicacion,contacto) VALUES(?, ?, ?)");
            $sentencia->execute(array($nombre,$ubicacion,$contacto));

        }

        function deleteBodegas($id){
            $sentencia = $this->db->prepare("DELETE FROM bodegas WHERE fk_id_bodega=?");
        $sentencia->execute(array($id));

        }
        function updateBodegas($id){
            $sentencia = $this->db->prepare("UPDATE bodegas SET finalizada=1 WHERE fk_id_bodega=?");
            $sentencia->execute(array($id));
    
        }
        
    }