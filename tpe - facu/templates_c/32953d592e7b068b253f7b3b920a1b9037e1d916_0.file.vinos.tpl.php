<?php
/* Smarty version 3.1.39, created on 2021-10-03 22:36:42
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vinos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a145abad116_09148867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32953d592e7b068b253f7b3b920a1b9037e1d916' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vinos.tpl',
      1 => 1633293399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_615a145abad116_09148867 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form action="createVino" method="post">
    <div class="form-group">
        <label for="nombreVino">nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombreVino" placeholder="Inserte el nombre del vino">
    </div>
    <div class="form-group">
        <label for="descripcionVino">descripcion</label>
        <input name="descripcion" type="text" class="form-control" id="descripcionVino"
            placeholder="Descripcion corta del vino">
    </div>
    <div class="form-group">
        <label for="precioVino">precio</label>
        <input name="precio" type="number" class="form-control" id="precioVino" placeholder="Precio">
    </div>

    <div class="form-group">
        <label for="Bodega">Bodega</label>
        <select name="bodega" id="bodega" class="form-control" id="Bodega">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bodegas']->value, 'bodega');
$_smarty_tpl->tpl_vars['bodega']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bodega']->value) {
$_smarty_tpl->tpl_vars['bodega']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
"><?php echo $_smarty_tpl->tpl_vars['bodega']->value->nombre;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
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
</a> bodega: <?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>
<a
                href="deleteVino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
">Borrar</a></li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
