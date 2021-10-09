<?php

class AuthHelper
{

    function __construct()
    {
    }

    function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION["nombre"])) {
            var_dump($_SESSION["nombre"]);
            header("Location: " . BASE_URL . "login");
            die;
        }
    }
}
