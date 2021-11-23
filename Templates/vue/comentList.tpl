{literal}

    <div id="app">

        <ul id="lista-comentarios" class="list-group">
            <li v-for="comentario in comentarios" class="list-group-item">
                {{comentario.usuario}} | {{comentario.puntuacion}} | {{comentario.comentario}}
            </li>
        </ul>

    </div>

{/literal}