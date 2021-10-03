<?php
/* Smarty version 3.1.39, created on 2021-10-04 00:32:12
  from 'C:\xampp\htdocs\TPEWeb2\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615a2f6cc0aab1_94166938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f39a488c62cf7d9469f3f743e2ba29ec49d253e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWeb2\\templates\\login.tpl',
      1 => 1633300330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_615a2f6cc0aab1_94166938 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Log In</h2>
            <form class="form-alta" action="verify" method="post">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    <h4 class="alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h4>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
