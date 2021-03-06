<?php

class ComentarioModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpeweb;charset=utf8', 'root', '');
    }

    function getComentarios(/*$idVino*/)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios /*WHERE fk_id_vino=?*/");
        $sentencia->execute(/*array($idVino)*/);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComentario($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id));
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }

    function deleteComentario($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE comentarios.id_comentario=?");
        $sentencia->execute(array($id));
    }

    function getComentariosVino($idVino)
    {
        $sentencia = $this->db->prepare("SELECT c.*, u.nombre AS usuario FROM comentarios c LEFT JOIN usuarios u ON c.fk_id_usuario = u.id_usuario WHERE fk_id_vino=?");
        $sentencia->execute(array($idVino));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComentariosOrdenados($idVino, $sort, $order)
    {
        $sentencia = $this->db->prepare("SELECT c.*, u.nombre AS usuario FROM comentarios c LEFT JOIN usuarios u ON c.fk_id_usuario = u.id_usuario WHERE fk_id_vino=? ORDER BY $sort $order");
        $sentencia->execute(array($idVino));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComentariosFiltrados($id, $puntuacion)
    {
        $sentencia = $this->db->prepare("SELECT c.*, u.nombre AS usuario FROM comentarios c LEFT JOIN usuarios u ON c.fk_id_usuario = u.id_usuario WHERE fk_id_vino=? && puntuacion=?");
        $sentencia->execute(array($id, $puntuacion));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function insertComment($comentario, $puntuacion, $idVino, $idUsuario)
    {

        $sentencia = $this->db->prepare("INSERT INTO comentarios(comentario, puntuacion, fk_id_vino, fk_id_usuario) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($comentario, $puntuacion, $idVino, $idUsuario));
        return $this->db->lastInsertId();
    }
}
