{include file='templates/header.tpl'}

<div class="container">
<!--verifica que estoy logueada si no no me deja entrar hasta loguearme--->
    <div class="row mt-6">
        <div class="col-md-6">
            <h2>Log In</h2>
            <form class="form-alta" action="verify" method="post">
                <input type="email" name="nombre" id="email" placeholder="email"  required>
                <input  type="password" name="password" id="password" placeholder="password" required>
                <input type="submit" class="btn btn-primary" value="Login">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='templates/footer.tpl'}
