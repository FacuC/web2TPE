{include file="header.tpl"}
<section class="seccionPrincipal">
    <h2>Bodegas</h2>
</section>
{if isset($smarty.session.admin) && $smarty.session.admin}
    <div class="formInput">
        {if isset($error)}
            <div class="alert-danger">{$error}</div>
        {/if}
        <form action="createBodega" method="post">

            <div class="form-group">
                <label for="nombreBodega">nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombreBodega"
                    placeholder="Inserte el nombre de la bodega">
            </div>
            <div class="form-group">
                <label for="ubicacionBodega">Ubicacion</label>
                <input name="ubicacion" type="text" class="form-control" id="ubicacionBodega" placeholder="Ubicacion">
            </div>
            <div class="form-group">
                <label for="contactoBodega">contacto</label>
                <input name="contacto" type="email" class="form-control" id="contactoBodega" placeholder="contacto">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
{/if}


<table class="table w-100 table-striped table-hover">
    <thead>
        <tr>
            <th>Bodega</th>
            <th>Ubicacion</th>
            <th>Contacto</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$bodegas item=$bodega}
            <tr>
                <td><a href="bodega/{$bodega->id_bodega}">
                        {$bodega->nombre}
                    </a></td>
                <td>{$bodega->ubicacion}</td>
                <td>{$bodega->contacto}</td>
                {if isset($smarty.session.admin) && $smarty.session.admin}
                    <td><a href="deleteBodega/{$bodega->id_bodega}">
                            borrar</a></td>
                {/if}

            </tr>
        {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}