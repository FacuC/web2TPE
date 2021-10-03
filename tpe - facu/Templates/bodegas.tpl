{include file="header.tpl"}
<h1>Bodegas</h1>

<form action="createBodega" method="post">
    <div class="form-group">
        <label for="nombreBodega">nombre</label>
        <input required name="nombre" type="text" class="form-control" id="nombreBodega"
            placeholder="Inserte el nombre de la bodega">
    </div>
    <div class="form-group">
        <label for="ubicacionBodega">Ubicacion</label>
        <input required name="ubicacion" type="text" class="form-control" id="ubicacionBodega" placeholder="Ubicacion">
    </div>
    <div class="form-group">
        <label for="contactoBodega">contacto</label>
        <input required name="contacto" type="email" class="form-control" id="contactoBodega" placeholder="contacto">
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

<ul>
    {foreach from=$bodegas item=bodega}
        <li><a href="bodega/{$bodega->id_bodega}">{$bodega->nombre}</a> contacto: {$bodega->contacto}</li>
    {/foreach}
</ul>


{include file="footer.tpl"}