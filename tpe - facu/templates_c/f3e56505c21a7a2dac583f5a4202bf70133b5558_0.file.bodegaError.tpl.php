<?php
/* Smarty version 3.1.39, created on 2021-10-03 22:36:04
  from 'C:\xampp\htdocs\TPEWeb2\Templates\bodegaError.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a14342361a1_28427793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3e56505c21a7a2dac583f5a4202bf70133b5558' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\bodegaError.tpl',
      1 => 1633293361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_615a14342361a1_28427793 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Error</h1>

<h4>La bodega aun tiene vinos, es necesario eliminar todos los vinos antes de borrar la bodega</h4>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
