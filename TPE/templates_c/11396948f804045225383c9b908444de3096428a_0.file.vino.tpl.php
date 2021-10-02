<?php
/* Smarty version 3.1.39, created on 2021-10-02 21:03:04
  from 'C:\xampp\htdocs\web2_3\TPE\templates\vino.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158ace8a8da53_72864399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11396948f804045225383c9b908444de3096428a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2_3\\TPE\\templates\\vino.tpl',
      1 => 1633201382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6158ace8a8da53_72864399 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1 class="h1 display-1 text-center"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a>
<ul class="list-group-hover-bg "> 
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>
</li>
    <li>$ <?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>
</li>
</ul>     
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
