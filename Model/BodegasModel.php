<?php

class BodegasModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpeweb;charset=utf8', 'root', '');
    }

    function getBodegas()
    {
        $sentencia = $this->db->prepare("SELECT * FROM bodegas");
        $sentencia->execute();
        $bodegas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $bodegas;
    }

    function getBodega($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM bodegas WHERE id_bodega=?");
        $sentencia->execute(array($id));
        $bodega = $sentencia->fetch(PDO::FETCH_OBJ);
        return $bodega;
    }

    function createBodega($nombre, $ubicacion, $contacto)
    {
        $sentencia = $this->db->prepare("INSERT INTO bodegas(nombre, ubicacion, contacto) VALUES(?, ?, ?)");
        $sentencia->execute(array($nombre, $ubicacion, $contacto));
    }
    function deleteBodega($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM bodegas WHERE id_bodega=?");
        $sentencia->execute(array($id));
    }
    function updateBodega($id, $nombre, $ubicacion, $contacto)
    {
        $sentencia = $this->db->prepare("UPDATE bodegas SET nombre=?, ubicacion=?, contacto=? WHERE id_bodega=?");
        $sentencia->execute(array($nombre, $ubicacion, $contacto, $id));
    }
}
