{include file="header.tpl"}
<h1 class="h1 display-1 text-center">{$titulo}</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a>
 <form class="form-alta" action="createBodega" method="post">>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="nombre">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <input type="text" name="ubicacion" class="form-control" id="exampleInputPassword1" placeholder="descripcion">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio</label>
    <input type="email" name="contacto" class="form-control" id="exampleInputPassword1" placeholder="precio">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table w-50 table-striped table-hover position-absolute top-50 start-50 translate-middle">
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
            </tr>
        {/foreach}
    </tbody>
</table>    
{include file="footer.tpl"}