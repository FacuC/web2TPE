{include file="header.tpl"}
<h1>{$bodega->nombre}</h1>

{if $logueado}
    <a href="deleteBodegas/{$bodega->id_bodega}">borrar</a></td> 
{/if} 
     
{if $logueado}
    <div class="formInput">
        <form action="updateBodega/{$bodega->id_bodega}" method="post">
            <div class="form-group">
                <label for="nombre">nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre">
            </div>
            <div class="form-group">
                <label for="ubicacion">ubicacion</label>
                <input name="ubicacion" type="text" class="form-control" id="ubicacion"
                    placeholder="Descripcion corta del vino">
            </div>
            <div class="form-group">
                <label for="contacto">contacto</label>
                <input name="contacto" type="email" class="form-control" id="contacto" placeholder="contacto">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{/if}
    
 <table class="table w-25 table-striped table-hover">
    <thead>
        <tr>
            <th>Bebidas</th>
            <th>Precios</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$vinos item=$vino}
            <tr class="table-active">
                <td><a href="vino/{$vino->id_vino}">
                    {$vino->nombre}
                </a></td>
                <td>
                   $ {$vino->descripcion}
                </td>
                <td>
                   $ {$vino->precio}
                </td>
                <td>
                    {$vino->bodega}
                </td>
                <td>
                <img src="img/{$vino->imagen}"/>    
                </td>
                {if $logueado}
                    <td><a href="deleteVino/{$vino->id_vino}">
                    borrar</a></td> 
                {/if}              
        {/foreach}
    </tbody>
 </table>
 {include file="footer.tpl"}
   