{include file="header.tpl"}

<ul class="list-group-hover-bg "> 
    <li>{$vino->nombre}</li>
    <li>{$vino->descripcion}</li>
    <li>$ {$vino->precio}</li>
    <li>{$vino->bodega}</li>
    {if $logueado}
      <li><a href="deleteVino/{$vino->id_vino}">Borrar</a></li>
    {/if}
    
</ul>
{if $logueado}
  <form class="form-alta" action="updateVino/{$vino->id_vino}" method="post">
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
    
    <button type="submit" class="btn btn-primary">update</button>
  </form>
  {/if}
{include file="footer.tpl"}