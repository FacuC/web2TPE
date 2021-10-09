{include file="header.tpl"}
<ul>
    <li>{$vino->nombre}</li>
    <li>{$vino->descripcion}</li>
    <li>$ {$vino->precio}</li>
    <li>{$vino->bodega}</li>
    <li><a href="deleteVino/{$vino->id_vino}">Borrar</a></li>
</ul>

<form action="updateVino/{$vino->id_vino}" method="post">
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

    <button type="submit" class="btn btn-primary">Update</button>
</form>

{include file="footer.tpl"}