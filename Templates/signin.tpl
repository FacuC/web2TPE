{include file='templates/header.tpl'}

<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <h2>{$titulo}</h2>
            <form class="form-alta" action="verifySignIn" method="post">
                <input  name="nombre" placeholder="email" type="email" id="email" required>
                <input name="password" placeholder="password" type="password"  id="password" required>
                <input type="submit" class="btn btn-primary" value="Sign In">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='templates/footer.tpl'}