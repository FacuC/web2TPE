<?php

class UserModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpeweb;charset=utf8', 'root', '');
    }

    function getUser($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $query->execute([$nombre]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function createUser($nombre, $pass)
    {
        $password = password_hash($pass, PASSWORD_BCRYPT);
        $query = $this->db->prepare('INSERT INTO usuarios(nombre, password) VALUES(?, ?)');
        $query->execute([$nombre, $password]);
    }

    function getUsers()
    {
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteUser($id)
    {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $query->execute(array($id));
    }

    function ascenderUser($id)
    {
        $query = $this->db->prepare("UPDATE usuarios SET rol = ? WHERE id_usuario = ?");
        $query->execute(array(1, $id));
    }

    function quitarPermisos($id)
    {
        $query = $this->db->prepare("UPDATE usuarios SET rol = ? WHERE id_usuario = ?");
        $query->execute(array(0, $id));
    }
}
