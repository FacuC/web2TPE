<?php
/* Smarty version 3.1.39, created on 2021-10-12 00:02:56
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vino.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6164b490dd66b3_91950003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6816aec147a2c2f36578ea28fbcfc69e146cdd9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vino.tpl',
      1 => 1633989762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6164b490dd66b3_91950003 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="vinoTitulo"><?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
</h1>

<div class="vinoContenedor">
    <ul class="detallesVino">
        <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>
</li>
    </ul>

    <div class="vinoImagen">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vino']->value->imagen;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
" srcset="">
    </div>
</div>


<?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
    <div class="formInput">
        <form action="updateVino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreVino">nombre</label>
                <input required value="<?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>
" name="nombre" type="text" class="form-control" id="nombreVino"
                    placeholder="Inserte el nombre del vino">
            </div>
            <div class="form-group">
                <label for="descripcionVino">descripcion</label>
                <input required value="<?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>
" name="descripcion" type="text" class="form-control"
                    id="descripcionVino" placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="precioVino">precio</label>
                <input required value="<?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>
" name="precio" type="number" class="form-control" id="precioVino"
                    placeholder="Precio">
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

            <div class="form-group">
                <label for="fileImagen">Imagen</label>
                <input name="imagen" type="file" class="form-control" id="fileImagen">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
    </div>
<?php }?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
