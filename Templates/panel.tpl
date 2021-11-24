{include file="header.tpl"}

<h1 class="loginTitle">{$titulo}</h1>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$users item=$user}
            <tr class="table-active">
                <td>
                    {$user->id_usuario}
                </td>
                <td>
                    {if $user->rol == 1} <i class="fas fa-user-cog"></i> {/if}{$user->nombre}
                </td>
                <td>
                    {if $user->rol == 1}
                        {if $user->id_usuario != $smarty.session.id}
                            <a href="quitarPermisos/{$user->id_usuario}">
                                downgrade
                            </a>
                        {/if}
                    {else}
                        <a href="otorgarPermisos/{$user->id_usuario}">upgrade</a>
                    {/if}
                </td>
                <td>
                    <a href="deleteUser/{$user->id_usuario}">borrar</a>
                </td>
            {/foreach}
    </tbody>
</table>
{if isset($smarty.session.admin) && $smarty.session.admin}

{/if}

{include file="footer.tpl"}