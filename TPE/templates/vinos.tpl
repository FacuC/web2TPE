 {include file="header.tpl"}
 <h1 class="h1 display-1 text-center">{$titulo}</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a> 

 <form <form class="form-alta" action="createVino" method="post">>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="nombre">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
 <table class="table w-25 table-striped table-hover position-absolute top-50 start-50 translate-middle">
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
                   $ {$vino->precio}
                </td>
                <td>
                    {$vino->bodega}
                </td>
                <td>
                <img src="img/{$vino->imagen}"/>    
                </td>       
        {/foreach}
    </tbody>
 </table>

 
 {include file="footer.tpl"}
   