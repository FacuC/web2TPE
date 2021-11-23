{include file="header.tpl"}

<h1 class="vinoTitulo">{$vino->nombre}</h1>

<div class="vinoContenedor">
    <ul class="detallesVino">
        <li>{$vino->descripcion}</li>
        <li>{$vino->precio}</li>
        <li>{$vino->bodega}</li>
    </ul>

    <div class="vinoImagen">
        <img src="{$vino->imagen}" alt="{$vino->nombre}" srcset="">
    </div>
</div>


{if isset($smarty.session.admin) && $smarty.session.admin}
    <div class="formInput">
        <form action="updateVino/{$vino->id_vino}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreVino">nombre</label>
                <input required value="{$vino->nombre}" name="nombre" type="text" class="form-control" id="nombreVino"
                    placeholder="Inserte el nombre del vino">
            </div>
            <div class="form-group">
                <label for="descripcionVino">descripcion</label>
                <input required value="{$vino->descripcion}" name="descripcion" type="text" class="form-control"
                    id="descripcionVino" placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="precioVino">precio</label>
                <input required value="{$vino->precio}" name="precio" type="number" class="form-control" id="precioVino"
                    placeholder="Precio">
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

            <button type="submit" class="btn btn-primary">Update</button>
    </div>
{/if}

{include file='templates/vue/comentList.tpl'}

<form action=""></form>

<form action="api/comentarios" id="dataVino" data-id_vino="{$vino->id_vino}" method="post">
    <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea>
    <input type="range" name="puntuacion" id="puntuacion" min="1" max="5" value="5">
    <button type="submit" id="enviarComentario">Comentar</button>
</form>

<script src="./js/appComentarios.js"></script>

{include file="footer.tpl"}