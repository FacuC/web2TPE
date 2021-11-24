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

<h3 class="comentar">Comentar</h3>
<form action="api/comentarios" id="dataVino" data-id_vino="{$vino->id_vino}" method="post">
    <div class="puntuacion">
        <input type="radio" id="1star" name="puntuacion" value="1">
        <label for="1star"><i class="fas fa-star"></i></label>
        <input type="radio" id="2star" name="puntuacion" value="2">
        <label for="2star"><i class="fas fa-star"></i></label>
        <input type="radio" id="3star" name="puntuacion" value="3">
        <label for="3star"><i class="fas fa-star"></i></label>
        <input type="radio" id="4star" name="puntuacion" value="4">
        <label for="4star"><i class="fas fa-star"></i></label>
        <input type="radio" id="5star" name="puntuacion" value="5" checked>
        <label for="5star"><i class="fas fa-star"></i></label>
    </div>
    <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea>
    <!--<input type="range" name="puntuacion" id="puntuacion" min="1" max="5" value="5">-->
    <button type="submit" id="enviarComentario">Comentar</button>
</form>

<script src="./js/appComentarios.js"></script>

{include file="footer.tpl"}