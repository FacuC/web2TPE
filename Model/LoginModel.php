<?php

class LoginModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=tpeweb;charset=utf8', 'root', '');
    }

    function getUsuario($nombre){

        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $query->execute([$nombre]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    function createUsuario($nombre,$password){
        
        $query = $this->db->prepare('INSERT INTO usuarios(nombre, password) VALUE(?,?)');
        $query->execute([$nombre,$password]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



}
