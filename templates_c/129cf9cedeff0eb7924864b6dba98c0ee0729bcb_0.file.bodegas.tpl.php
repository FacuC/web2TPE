<?php
/* Smarty version 3.1.39, created on 2021-10-14 23:24:27
  from 'C:\xampp\htdocs\TPEWeb2\Templates\bodegas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168a00be4d352_77835766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '129cf9cedeff0eb7924864b6dba98c0ee0729bcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\Templates\\bodegas.tpl',
      1 => 1634246663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6168a00be4d352_77835766 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="seccionPrincipal">
    <h2>Bodegas</h2>
</section>
<?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
    <div class="formInput">
        <form action="createBodega" method="post">
            <div class="form-group">
                <label for="nombreBodega">nombre</label>
                <input required name="nombre" type="text" class="form-control" id="nombreBodega"
                    placeholder="Inserte el nombre de la bodega">
            </div>
            <div class="form-group">
                <label for="ubicacionBodega">Ubicacion</label>
                <input required name="ubicacion" type="text" class="form-control" id="ubicacionBodega"
                    placeholder="Ubicacion">
            </div>
            <div class="form-group">
                <label for="contactoBodega">contacto</label>
                <input required name="contacto" type="email" class="form-control" id="contactoBodega"
                    placeholder="contacto">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
<?php }?>


<table class="table w-100 table-striped table-hover">
    <thead>
        <tr>
            <th>Bodega</th>
            <th>Ubicacion</th>
            <th>Contacto</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bodegas']->value, 'bodega');
$_smarty_tpl->tpl_vars['bodega']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bodega']->value) {
$_smarty_tpl->tpl_vars['bodega']->do_else = false;
?>
            <tr>
                <td><a href="bodega/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['bodega']->value->nombre;?>

                    </a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['bodega']->value->ubicacion;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['bodega']->value->contacto;?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['logueado']->value) {?>
                    <td><a href="deleteBodegas/<?php echo $_smarty_tpl->tpl_vars['bodega']->value->id_bodega;?>
">
                            borrar</a></td>
                <?php }?>

            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
