{include file="header.tpl"}
<h1 class="h1 display-1 text-center">{$titulo}</h1>
 <a href="home">volver</a>
 <a href="bodegas">bodegas</a>
<ul class="list-group-hover-bg "> 
    <li>{$vino->nombre}</li>
    <li>{$vino->descripcion}</li>
    <li>$ {$vino->precio}</li>
    <li>{$vino->bodega}</li>
</ul>     
{include file="footer.tpl"}