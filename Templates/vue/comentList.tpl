{literal}
    <div id="app">

        <h2>Comentarios (<span v-if="comentarios.length">{{ comentarios.length }}</span>)
        </h2>
        <div id="sortButtons">
            <span>ordenar por</span>
            <input id="ordenFecha" type="button" value="fecha">
            <input id="ordenPuntuacion" type="button" value="puntuacion">
        </div>
        <div id="filtrarPuntuacion">
            <span>Mostrar solo comentarios con</span>
            <a><i class="fas fa-star"></i></a>
            <a><i class="fas fa-star"></i></a>
            <a><i class="fas fa-star"></i></a>
            <a><i class="fas fa-star"></i></a>
            <a><i class="fas fa-star"></i></a>
        </div>
        <ul id="lista-comentarios" class="list-group listComments">
            <li v-for="comentario in comentarios" class="list-group-item comment">
                <div class="usuario">
                    {{comentario.usuario}} | <i v-for="n in parseInt(comentario.puntuacion)" class="fas fa-star"></i>
                </div>
                <div class="comentarioTexto">{{comentario.comentario}}</div>
                <span class="fecha">{{comentario.fecha}}</span>
                <input class="botonEliminar" id="eliminarComentario" type="button"
                    :data-id_comentario="comentario.id_comentario" value="borrar">
            </li>
        </ul>
    </div>
{/literal}