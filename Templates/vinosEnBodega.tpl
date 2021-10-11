{include file="header.tpl"}
<h1>{$bodega->nombre}</h1>
{if $logueado}
    <a href="deleteBodega/{$bodega->id_bodega}">Borrar</a>
{/if}

{if $logueado}
    <div class="formInput">
        <form action="updateBodega/{$bodega->id_bodega}" method="post">
            <div class="form-group">
                <label for="nombre">nombre</label>
                <input required name="nombre" type="text" class="form-control" id="nombre"
                    placeholder="Inserte el nombre de la bodega">
            </div>
            <div class="form-group">
                <label for="ubicacion">ubicacion</label>
                <input required name="ubicacion" type="text" class="form-control" id="ubicacion"
                    placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="contacto">contacto</label>
                <input required name="contacto" type="email" class="form-control" id="contacto" placeholder="contacto">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{/if}


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Bebidas</th>
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
                {if $logueado}
                    <td><a href="deleteVino/{$vino->id_vino}">
                            borrar</a></td>
                {/if}

            {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}