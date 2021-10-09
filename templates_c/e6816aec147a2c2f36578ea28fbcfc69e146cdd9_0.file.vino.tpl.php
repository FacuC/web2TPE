<?php
/* Smarty version 3.1.39, created on 2021-10-08 15:35:41
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vino.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6160492d8afaa5_14102926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6816aec147a2c2f36578ea28fbcfc69e146cdd9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vino.tpl',
      1 => 1633468280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6160492d8afaa5_14102926 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<ul>
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>
</li>
    <li>$ <?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>
</li>
    <li><a href="deleteVino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
">Borrar</a></li>
</ul>

<form action="updateVino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
" method="post">
    <div class="form-group">
        <label for="nombreVino">nombre</label>
        <input required name="nombre" type="text" class="form-control" id="nombreVino"
            placeholder="Inserte el nombre del vino">
    </div>
    <div class="form-group">
        <label for="descripcionVino">descripcion</label>
        <input required name="descripcion" type="text" class="form-control" id="descripcionVino"
            placeholder="Descripcion corta del vino">
    </div>
    <div class="form-group">
        <label for="precioVino">precio</label>
        <input required name="precio" type="number" class="form-control" id="precioVino" placeholder="Precio">
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

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
