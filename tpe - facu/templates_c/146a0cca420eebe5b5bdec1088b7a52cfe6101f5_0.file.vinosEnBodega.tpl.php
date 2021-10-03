<?php
/* Smarty version 3.1.39, created on 2021-10-03 22:07:42
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vinosEnBodega.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a0d8e734a35_32769458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '146a0cca420eebe5b5bdec1088b7a52cfe6101f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vinosEnBodega.tpl',
      1 => 1633291650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_615a0d8e734a35_32769458 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1><?php echo $_smarty_tpl->tpl_vars['bodega']->value->nombre;?>
</h1>

<a href="deleteBodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
">Borrar</a>

<form action="updateBodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
" method="post">
    <div class="form-group">
        <label for="nombre">nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Inserte el nombre del vino">
    </div>
    <div class="form-group">
        <label for="ubicacion">ubicacion</label>
        <input name="ubicacion" type="text" class="form-control" id="ubicacion"
            placeholder="Descripcion corta del vino">
    </div>
    <div class="form-group">
        <label for="contacto">contacto</label>
        <input name="contacto" type="email" class="form-control" id="contacto" placeholder="contacto">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<ul>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vinos']->value, 'vino');
$_smarty_tpl->tpl_vars['vino']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vino']->value) {
$_smarty_tpl->tpl_vars['vino']->do_else = false;
?>
        <li><a href="vino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
"><?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
descripcion: <?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>
 precio: $
                <?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>
</a></li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</ul>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
