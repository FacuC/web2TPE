<?php
/* Smarty version 3.1.39, created on 2021-10-11 22:24:48
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vinos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61649d909067d5_99719629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32953d592e7b068b253f7b3b920a1b9037e1d916' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vinos.tpl',
      1 => 1633983886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_61649d909067d5_99719629 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="seccionPrincipal">
    <h2>Seleccion de vinos</h2>
</section>
<?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
    <div class="formInput">
        <form action="createVino" method="post" enctype="multipart/form-data">
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

            <div class="form-group">
                <label for="fileImagen">Imagen</label>
                <input name="imagen" type="file" class="form-control" id="fileImagen">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
<?php }?>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Bebidas</th>
            <th>Precios</th>
            <th>Bodega</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vinos']->value, 'vino');
$_smarty_tpl->tpl_vars['vino']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vino']->value) {
$_smarty_tpl->tpl_vars['vino']->do_else = false;
?>
            <tr class="table-active">
                <td><a href="vino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['vino']->value->nombre;?>

                    </a></td>
                <td>
                    $ <?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>

                </td>
                <td>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['vino']->value->imagen;?>
" />
                </td>
                <?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
                    <td><a href="deleteVino/<?php echo $_smarty_tpl->tpl_vars['vino']->value->id_vino;?>
">
                            borrar</a></td>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
