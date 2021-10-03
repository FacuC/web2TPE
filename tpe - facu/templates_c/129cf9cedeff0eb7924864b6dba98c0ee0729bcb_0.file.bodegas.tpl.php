<?php
/* Smarty version 3.1.39, created on 2021-10-03 20:53:33
  from 'C:\xampp\htdocs\TPEWeb2\Templates\bodegas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6159fc2d116af5_28350228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '129cf9cedeff0eb7924864b6dba98c0ee0729bcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\bodegas.tpl',
      1 => 1633287198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6159fc2d116af5_28350228 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Bodegas</h1>

<form action="createBodega" method="post">
    <div class="form-group">
        <label for="nombreBodega">nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombreBodega"
            placeholder="Inserte el nombre de la bodega">
    </div>
    <div class="form-group">
        <label for="ubicacionBodega">Ubicacion</label>
        <input name="ubicacion" type="text" class="form-control" id="ubicacionBodega" placeholder="Ubicacion">
    </div>
    <div class="form-group">
        <label for="contactoBodega">contacto</label>
        <input name="contacto" type="email" class="form-control" id="contactoBodega" placeholder="contacto">
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bodegas']->value, 'bodega');
$_smarty_tpl->tpl_vars['bodega']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bodega']->value) {
$_smarty_tpl->tpl_vars['bodega']->do_else = false;
?>
        <li><a href="bodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
"><?php echo $_smarty_tpl->tpl_vars['bodega']->value->nombre;?>
</a> contacto: <?php echo $_smarty_tpl->tpl_vars['bodega']->value->contacto;?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
