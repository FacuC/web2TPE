{include file="header.tpl"}
{if $logueado}

    <div class="formInput">
    <form class="form-alta" action="createBodega" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="nombre">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Ubicacion</label>
        <input type="text" name="ubicacion" class="form-control" id="exampleInputPassword1" placeholder="ubicacion">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Contacto</label>
        <input type="email" name="contacto" class="form-control" id="exampleInputPassword1" placeholder="contacto">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
{/if}


<table class="table w-50 table-striped table-hover sm-auto">
    <thead>
        <tr>
            <th>Bodega</th>
            <th>Ubicacion</th>
            <th>Contacto</th>
        </tr>
    </thead>
    <tbody> 
        {foreach from=$bodegas item=$bodega}
            <tr>
                <td><a href="bodega/{$bodega->id_bodega}">
                {$bodega->nombre}
                </a></td>
                <td>{$bodega->ubicacion}</td>
                <td>{$bodega->contacto}</td>
                {if $logueado}
                  <td><a href="deleteBodegas/{$bodega->id_bodega}">
                    borrar</a></td>  
                {/if}
                  
            </tr>
        {/foreach}
    </tbody>
</table>    
{include file="footer.tpl"}