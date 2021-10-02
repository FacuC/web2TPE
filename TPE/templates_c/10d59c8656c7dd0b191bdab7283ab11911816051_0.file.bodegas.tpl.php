<?php
/* Smarty version 3.1.39, created on 2021-10-02 23:26:22
  from 'C:\xampp\htdocs\web2_3\TPE\templates\bodegas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158ce7ed6ff51_58482333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10d59c8656c7dd0b191bdab7283ab11911816051' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2_3\\TPE\\templates\\bodegas.tpl',
      1 => 1633209973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6158ce7ed6ff51_58482333 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1 class="h1 display-1 text-center"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a>
 <form class="form-alta" action="createBodega" method="post">>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="nombre">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <input type="text" name="ubicacion" class="form-control" id="exampleInputPassword1" placeholder="descripcion">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio</label>
    <input type="email" name="contacto" class="form-control" id="exampleInputPassword1" placeholder="precio">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table w-50 table-striped table-hover position-absolute top-50 start-50 translate-middle">
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
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>    
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
