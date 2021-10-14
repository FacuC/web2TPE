{include file="header.tpl"}
<h2 class="loginTitle">Log In</h2>

<div class="container">
    <div class="logInLayout">
        <form class="form-alta" action="verify" method="post">
            <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
            <input placeholder="password" type="password" name="password" id="password" required>
            <input type="submit" class="btn btn-primary btn_login">
        </form>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='footer.tpl'}