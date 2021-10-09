 {include file="header.tpl"}
 {if $logueado}
    <div class="formInput">
 
        <form class="form-alta" action="createVino" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="nombre">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" placeholder="descripcion">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Precio</label>
            <input type="number" name="precio" class="form-control" id="exampleInputPassword1" placeholder="precio">
          </div>
          
          <div class="form-group">
          <label for="exampleFormControlSelect1">Bodega</label>
          <select name="bodega" class="form-control" id="exampleFormControlSelect1">
              {foreach from=$bodegas item=$bodega}
                <option value="{$bodega->id_bodega}">{$bodega->nombre}</option>
              {/foreach}
          </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
 {/if}
 
 <table class="table w-25 table-striped table-hover">
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
   