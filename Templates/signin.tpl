{include file="header.tpl"}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Sign In</h2>
            <form class="form-alta" action="verifySignIn" method="post">
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                <input placeholder="password" type="password" name="password" id="password" required>
                <input type="submit" class="btn btn-primary" value="Signin">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='footer.tpl'}