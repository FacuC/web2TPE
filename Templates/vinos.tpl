{include file="header.tpl"}
<section class="seccionPrincipal">
    <h2>Seleccion de vinos</h2>
</section>
{if isset($smarty.session.admin) && $smarty.session.admin}

    <h3 class="homeTitle">Crear nuevo</h3>

    <div class="formInput">
        {if isset($error)}
            <div class="alert-danger">{$error}</div>
        {/if}
        <form action="createVino" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreVino">nombre</label>
                <input required name="nombre" type="text" class="form-control" id="nombreVino"
                    placeholder="Inserte el nombre del vino">
            </div>
            <div class="form-group">
                <label for="descripcionVino">descripcion</label>
                <input required name="descripcion" type="text" class="form-control" id="descripcionVino"
                    placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="precioVino">precio</label>
                <input required name="precio" type="number" class="form-control" id="precioVino" placeholder="Precio">
            </div>

            <div class="form-group">
                <label for="Bodega">Bodega</label>
                <select name="bodega" id="bodega" class="form-control" id="Bodega">
                    {foreach from=$bodegas item=bodega}
                        <option value="{$bodega->id_bodega}">{$bodega->nombre}</option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label for="fileImagen">Imagen</label>
                <input name="imagen" type="file" class="form-control" id="fileImagen">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
{/if}

{if isset($smarty.session.nombre)}

    <h3 class="homeTitle">Buscar</h3>

    <div class="formInput">
        <form class="formBuscar" action="buscarVino" method="get" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreVino">nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombreVinoBusqueda"
                    placeholder="Inserte el nombre del vino">
            </div>
            <div class="form-group">
                <label for="descripcionVino">descripcion</label>
                <input name="descripcion" type="text" class="form-control" id="descripcionVinoBusqueda"
                    placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="precioVino">precio</label>
                <input name="precio" type="number" class="form-control" id="precioVinoBusqueda" placeholder="Precio">
            </div>

            <div class="form-group">
                <label for="Bodega">Bodega</label>
                <select name="bodega" id="bodega" class="form-control" id="BodegaBusqueda">
                    {foreach from=$bodegas item=bodega}
                        <option value="{$bodega->id_bodega}">{$bodega->nombre}</option>
                    {/foreach}
                    <option value="any">Any</option>
                </select>
            </div>
            <button class="botonBuscar" type="submit" class="btn btn-primary">Buscar</button>
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