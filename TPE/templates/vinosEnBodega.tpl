{include file="header.tpl"}
 <h1 class="h1 display-1 text-center">{$bodega}</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a> 

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
        {/foreach}
    </tbody>
 </table>
 {include file="footer.tpl"}
   