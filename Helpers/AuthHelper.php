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
            header("Location: " . BASE_URL . "login");
            die;
        }
    }

    function getUserName()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return $_SESSION["nombre"];
    }

    function isLoggedIn()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION["nombre"])) {
            return false;
        } else {
            return true;
        }
    }
}
