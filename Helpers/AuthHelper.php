<?php

class AuthHelper
{

    function __construct()
    {
    }

    function verify()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    function checkLoggedIn()
    {
        $this->verify();
        if (!isset($_SESSION["rol"])) {
            header("Location: " . BASE_URL . "login");
            die;
        }
    }

    function checkAdmin()
    {
        $this->verify();
        if (!isset($_SESSION["rol"]) || $_SESSION["rol"] < 1) {
            header("Location: " . BASE_URL . "login");
            die;
        }
    }

    function login($user)
    {
        session_start();
        $_SESSION['nombre'] = $user->nombre;
        $_SESSION['rol'] = $user->rol;
        $_SESSION['id'] = $user->id_usuario;
        $_SESSION['admin'] = $_SESSION['rol'] >= 1;
    }

    function logout()
    {
        $this->verify();
        session_destroy();
        header("Location: " . BASE_URL . "login");
        die;
    }

    function getUserName()
    {
        $this->verify();
        return $_SESSION['nombre'];
    }

    function getUserId()
    {
        $this->verify();
        return $_SESSION["id"];
    }

    function isAdmin()
    {
        $this->verify();
        return $_SESSION['admin'];
    }
}
