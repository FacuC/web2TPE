{include file="header.tpl"}

<form action="createVino" method="post">
    <div class="form-group">
        <label for="nombreVino">nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombreVino" placeholder="Inserte el nombre del vino">
    </div>
    <div class="form-group">
        <label for="descripcionVino">descripcion</label>
        <input name="descripcion" type="text" class="form-control" id="descripcionVino"
            placeholder="Descripcion corta del vino">
    </div>
    <div class="form-group">
        <label for="precioVino">precio</label>
        <input name="precio" type="number" class="form-control" id="precioVino" placeholder="Precio">
    </div>

    <div class="form-group">
        <label for="Bodega">Bodega</label>
        <select name="bodega" id="bodega" class="form-control" id="Bodega">
            {foreach from=$bodegas item=bodega}
                <option value="{$bodega->id_bodega}">{$bodega->nombre}</option>
            {/foreach}
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

<ul>
    {foreach from=$vinos item=vino}
        <li><a href="vino/{$vino->id_vino}">{$vino->nombre}</a> bodega: {$vino->bodega}<a
                href="deleteVino/{$vino->id_vino}">Borrar</a></li>
    {/foreach}
</ul>
{include file="footer.tpl"}