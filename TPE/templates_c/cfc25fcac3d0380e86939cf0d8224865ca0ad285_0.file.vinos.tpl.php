<?php
/* Smarty version 3.1.39, created on 2021-09-26 20:46:48
  from 'C:\xampp\htdocs\web2_3\TPE\template\vinos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6150c018d93863_40349434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfc25fcac3d0380e86939cf0d8224865ca0ad285' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2_3\\TPE\\template\\vinos.tpl',
      1 => 1632682003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6150c018d93863_40349434 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a>
 <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <?php }
}
