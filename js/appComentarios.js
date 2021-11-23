"use strict";

document.addEventListener("DOMContentLoaded", () => {
    const API_URL = "api/comentarios";

    //document.querySelector(".form-alta").addEventListener("submit", agregarTarea);

    let app = new Vue({
        el: "#app",
        data: {
            comentarios: [], // this->smarty->assign("comentarios",  $comentarios)
        },
    });

    async function getComentariosVino() {
        // fetch para traer todos los comentarios
        let url = document.querySelector("#dataVino").dataset.id_vino;
        try {
            let response = await fetch(API_URL + "/vino/" + url);
            let comentariosAPI = await response.json();
            app.comentarios = comentariosAPI;
            console.log(comentariosAPI);
        } catch (e) {
            console.log(e);
        }
    }

    async function agregarComentario(e) {
        e.preventDefault();
        let comentario = document.querySelector("#comentario").value;
        let puntuacion = document.querySelector("#puntuacion").value;
        let idVino = document.querySelector("#dataVino").dataset.id_vino;

        if (comentario == "" || puntuacion === null) {
            alert("uno de los campos estaba vacio");
        } else {
            let nuevoComentario = {
                comentario: comentario,
                puntuacion: puntuacion,
            };
            try {
                let res = await fetch(API_URL + "/vino/" + idVino, {
                    method: "POST",
                    headers: { "Content-type": "application/json" },
                    body: JSON.stringify(nuevoComentario),
                });
                if (res.ok) {
                    console.log(res);
                    getComentariosVino();
                }
            } catch (error) {
                console.log(error);
            }
        }
    }

    let enviarComentario = document.querySelector("#enviarComentario");

    enviarComentario.addEventListener("click", agregarComentario);

    getComentariosVino();
});