{include file="header.tpl"}
<section class="seccionPrincipal">
    <h2>{$bodega->nombre}</h2>
</section>

{if isset($smarty.session.admin) && $smarty.session.admin}
    <div class="deleteBodega">
        <a href="deleteBodega/{$bodega->id_bodega}">Borrar</a>
    </div>
{/if}

{if isset($smarty.session.admin) && $smarty.session.admin}
    <div class="formInput">
        {if isset($error)}
            <div class="alert-danger">{$error}</div>
        {/if}
        <form action="updateBodega/{$bodega->id_bodega}" method="post">
            <div class="form-group">
                <label for="nombre">nombre</label>
                <input required name="nombre" type="text" class="form-control" id="nombre" value="{$bodega->nombre}"
                    placeholder="Inserte el nombre de la bodega">
            </div>
            <div class="form-group">
                <label for="ubicacion">ubicacion</label>
                <input required name="ubicacion" type="text" class="form-control" id="ubicacion"
                    value="{$bodega->ubicacion}" placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="contacto">contacto</label>
                <input required name="contacto" type="email" class="form-control" id="contacto" placeholder="contacto"
                    value="{$bodega->contacto}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{/if}


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precios</th>
            <th>Bodega</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$vinos item=$vino}
            <tr class="table-active">
                <td><a href="vino/{$vino->id_vino}">
                        {$vino->nombre}
                    </a></td>
                <td>
                    $ {$vino->precio}
                </td>
                <td>
                    {$vino->bodega}
                </td>
                <td>
                    <img src="{$vino->imagen}" />
                </td>
                {if isset($smarty.session.admin) && $smarty.session.admin}
                    <td><a href="deleteVino/{$vino->id_vino}">
                            borrar</a></td>
                {/if}

            {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}