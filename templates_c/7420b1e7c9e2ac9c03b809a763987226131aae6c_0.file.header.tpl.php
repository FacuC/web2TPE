<?php
/* Smarty version 3.1.39, created on 2021-10-09 23:45:12
  from 'C:\xampp\htdocs\TPEWeb2\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61620d6853c2a4_12573199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7420b1e7c9e2ac9c03b809a763987226131aae6c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\templates\\header.tpl',
      1 => 1633815888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61620d6853c2a4_12573199 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <base href=<?php echo BASE_URL;?>
 />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/4b5075b66f.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
</head>

<body>

    <header>
        <div class="login">
            <?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</a>
                <a href="./logout">Log Out</a>
            <?php } else { ?>
                <a href="./login">Log In</a>
                <a href="./signIn">Sign In</a>
            <?php }?>
        </div>

        <h1>
            <a href="./home">SpeakEasy</a>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, at.</p>
    </header>



    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <div class="burgerMenu">
                    <div class="burgerMenu__bars"></div>
                </div>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./home">Home</a>
                </li>
                <img src="./img/favicon.svg" alt="" srcset="">
                <li class="nav-item">
                    <a class="nav-link" href="./bodegas">Bodegas</a>
                </li>
            </ul>
        </div>
</nav><?php }
}
