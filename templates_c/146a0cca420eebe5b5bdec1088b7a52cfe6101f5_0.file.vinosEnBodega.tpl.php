<?php
/* Smarty version 3.1.39, created on 2021-10-14 23:42:33
  from 'C:\xampp\htdocs\TPEWeb2\Templates\vinosEnBodega.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168a4491dc162_25015061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '146a0cca420eebe5b5bdec1088b7a52cfe6101f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\vinosEnBodega.tpl',
      1 => 1634247749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6168a4491dc162_25015061 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="seccionPrincipal">
    <h2><?php echo $_smarty_tpl->tpl_vars['bodega']->value->nombre;?>
</h2>
</section>

<?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
    <div class="deleteBodega">
        <a href="deleteBodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
">Borrar</a>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
    <div class="formInput">
        <form action="updateBodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
" method="post">
            <div class="form-group">
                <label for="nombre">nombre</label>
                <input required name="nombre" type="text" class="form-control" id="nombre"
                    placeholder="Inserte el nombre de la bodega">
            </div>
            <div class="form-group">
                <label for="ubicacion">ubicacion</label>
                <input required name="ubicacion" type="text" class="form-control" id="ubicacion"
                    placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="contacto">contacto</label>
                <input required name="contacto" type="email" class="form-control" id="contacto" placeholder="contacto">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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
