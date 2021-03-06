<?php

class VinosModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpeweb;charset=utf8', 'root', '');
    }

    function getVinos()
    {
        $sentencia = $this->db->prepare("SELECT vinos.*, bodegas.nombre as bodega FROM vinos JOIN bodegas ON vinos.fk_id_bodega=bodegas.id_bodega");
        $sentencia->execute();
        $vinos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinos;
    }

    function getVino($id)
    {
        $sentencia = $this->db->prepare("SELECT vinos.*, bodegas.nombre as bodega FROM vinos JOIN bodegas ON vinos.fk_id_bodega=bodegas.id_bodega WHERE id_vino=?");
        $sentencia->execute(array($id));
        $vino = $sentencia->fetch(PDO::FETCH_OBJ);
        return $vino;
    }

    function getVinosEnBodega($id_bodega)
    {
        $sentencia = $this->db->prepare("SELECT vinos.*, bodegas.nombre as bodega FROM vinos JOIN bodegas ON vinos.fk_id_bodega=bodegas.id_bodega WHERE fk_id_bodega=?");
        $sentencia->execute(array($id_bodega));
        $vinos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinos;
    }

    function buscarVinos($nombre, $descripcion, $precio, $bodega)
    {
        $sentencia = $this->db->prepare("SELECT vinos.*, bodegas.nombre as bodega FROM vinos JOIN bodegas ON vinos.fk_id_bodega=bodegas.id_bodega WHERE vinos.nombre LIKE ? && vinos.descripcion LIKE ? && vinos.precio LIKE ? && vinos.fk_id_bodega LIKE ?");
        $sentencia->execute(array($nombre, $descripcion, $precio, $bodega));
        $vinos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinos;
    }

    function insertVino($nombre, $descripcion, $precio, $bodega, $filePath = "")
    {
        if ($filePath != "") {
            $sentencia = $this->db->prepare("INSERT INTO vinos(nombre, descripcion, precio, fk_id_bodega, imagen) VALUES(?, ?, ?, ?, ?)");
            $sentencia->execute(array($nombre, $descripcion, $precio, $bodega, $filePath));
        } else {
            $sentencia = $this->db->prepare("INSERT INTO vinos(nombre, descripcion, precio, fk_id_bodega) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($nombre, $descripcion, $precio, $bodega));
        }
    }
    function deleteVino($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM vinos WHERE id_vino=?");
        $sentencia->execute(array($id));
    }
    function updateVino($id, $nombre, $descripcion, $precio, $bodega, $filePath = "")
    {
        if ($filePath != "") {
            $sentencia = $this->db->prepare("UPDATE vinos SET nombre=?, descripcion=?, precio=?, fk_id_bodega=?, imagen=? WHERE id_vino=?");
            $sentencia->execute(array($nombre, $descripcion, $precio, $bodega, $filePath, $id));
        } else {
            $sentencia = $this->db->prepare("UPDATE vinos SET nombre=?, descripcion=?, precio=?, fk_id_bodega=? WHERE id_vino=?");
            $sentencia->execute(array($nombre, $descripcion, $precio, $bodega, $id));
        }
    }
}
