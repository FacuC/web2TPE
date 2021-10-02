<?php
/* Smarty version 3.1.39, created on 2021-10-02 23:21:18
  from 'C:\xampp\htdocs\web2_3\TPE\templates\vinosEnBodega.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158cd4e72a364_34469169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46de0d7406882491dc2724acef581a2055319ee5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2_3\\TPE\\templates\\vinosEnBodega.tpl',
      1 => 1633209641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6158cd4e72a364_34469169 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <h1 class="h1 display-1 text-center"><?php echo $_smarty_tpl->tpl_vars['bodega']->value;?>
</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a> 

 <table class="table w-25 table-striped table-hover position-absolute top-50 start-50 translate-middle">
    <thead>
        <tr>
            <th>Bebidas</th>
            <th>Precios</th>
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
                   $ <?php echo $_smarty_tpl->tpl_vars['vino']->value->descripcion;?>

                </td>
                <td>
                   $ <?php echo $_smarty_tpl->tpl_vars['vino']->value->precio;?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['vino']->value->bodega;?>

                </td>
                <td>
                <img src="img/<?php echo $_smarty_tpl->tpl_vars['vino']->value->imagen;?>
"/>    
                </td>       
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
 </table>
 <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <?php }
}
