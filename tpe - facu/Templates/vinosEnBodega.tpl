{include file="header.tpl"}
<h1>{$bodega->nombre}</h1>

<a href="deleteBodega/{$bodega->id_bodega}">Borrar</a>

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

<ul>

    {foreach from=$vinos item=vino }
        <li><a href="vino/{$vino->id_vino}">{$vino->nombre}descripcion: {$vino->descripcion} precio: $
                {$vino->precio}</a></li>
    {/foreach}

</ul>
{include file="footer.tpl"}