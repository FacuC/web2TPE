"use strict";

document.addEventListener("DOMContentLoaded", () => {
    const API_URL = "api/comentarios";

    let ordenASC = true;

    let app = new Vue({
        el: "#app",
        data: {
            comentarios: [], // this->smarty->assign("comentarios",  $comentarios)
            orden: ordenASC,
        },
    });

    let listaComentarios = document.querySelector("#lista-comentarios");

    const addEvent = function(mutations, observer) {
        let botonesEliminar = document.querySelectorAll("#eliminarComentario");
        botonesEliminar.forEach((boton) => {
            boton.addEventListener("click", eliminarComentario);
        });
    };

    const observer = new MutationObserver(addEvent);

    observer.observe(listaComentarios, { childList: true });

    async function getComentariosVino() {
        // fetch para traer todos los comentarios
        let url = document.querySelector("#dataVino").dataset.id_vino;
        console.log(API_URL + "/vino/" + url);
        try {
            let response = await fetch(API_URL + "/vino/" + url);
            let comentariosAPI = await response.json();
            app.comentarios = comentariosAPI;
            console.log(comentariosAPI);
        } catch (e) {
            console.log(e);
        }
    }

    async function getComentariosOrdenados(sortBy) {
        // fetch para traer todos los comentarios
        let url = document.querySelector("#dataVino").dataset.id_vino;

        let orden;
        if (ordenASC) {
            orden = "ASC";
        } else {
            orden = "DESC";
        }

        // api/comentarios/vino/77?sort="puntuacion"&orden="ASC"
        url += "?sort=" + sortBy + "&order=" + orden;
        console.log(url);
        try {
            let response = await fetch(API_URL + "/vino/" + url);
            let comentariosAPI = await response.json();
            app.comentarios = comentariosAPI;
            console.log(comentariosAPI);
        } catch (e) {
            console.log(e);
        }
    }

    async function getComentariosFiltrados(puntuacion) {
        // fetch para traer todos los comentarios
        let url = document.querySelector("#dataVino").dataset.id_vino;

        // api/comentarios/vino/77?puntuacion="2"
        url += "?puntuacion=" + puntuacion;
        console.log(url);
        try {
            let response = await fetch(API_URL + "/vino/" + url);
            let comentariosAPI = await response.json();
            app.comentarios = comentariosAPI;
            console.log(response);
        } catch (e) {
            console.log(e);
        }
    }

    async function agregarComentario(e) {
        e.preventDefault();

        //itera entre los radio buttons y devuelve el valor seleccionado
        const rbs = document.querySelectorAll('input[name="puntuacion"]');
        let selectedValue;
        for (const rb of rbs) {
            if (rb.checked) {
                selectedValue = rb.value;
                break;
            }
        }

        let puntuacion = selectedValue;
        let comentario = document.querySelector("#comentario").value;
        let idVino = document.querySelector("#dataVino").dataset.id_vino;

        if (comentario == "" || puntuacion === null) {
            alert("El comentario no puede estar vacio");
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
                } else {
                    alert("Debe loguearse para comentar");
                }
            } catch (error) {
                alert("Debe loguearse para comentar");
                console.log(error);
            }
        }
    }

    async function eliminarComentario(e) {
        let id = e.target.dataset.id_comentario;
        try {
            let response = await fetch(API_URL + "/deleteComment/" + id, {
                method: "DELETE",
            });
            console.log(response);
            if (response.ok) {
                console.log(response);
                getComentariosVino();
            } else {
                alert("Solo el administrador puede eliminar comentarios");
            }
        } catch (e) {
            alert("Solo el administrador puede eliminar comentarios");
            console.log(e);
        }
    }

    let enviarComentario = document.querySelector("#enviarComentario");
    let ordenarFecha = document.querySelector("#ordenFecha");
    let ordenarPuntuacion = document.querySelector("#ordenPuntuacion");
    let filtrarPuntuacion = document.querySelectorAll("#filtrarPuntuacion i");
    let mostrarTodos = document.querySelector("#mostrarTodos");

    mostrarTodos.addEventListener("click", getComentariosVino);

    filtrarPuntuacion.forEach((estrella, key) => {
        estrella.addEventListener("click", () => {
            getComentariosFiltrados(key + 1);
        });
    });

    enviarComentario.addEventListener("click", agregarComentario);
    ordenarFecha.addEventListener("click", () => {
        ordenASC = !ordenASC;
        getComentariosOrdenados("fecha");
    });
    ordenarPuntuacion.addEventListener("click", () => {
        ordenASC = !ordenASC;
        getComentariosOrdenados("puntuacion");
    });

    getComentariosVino();

    //PUNTUACION ESTRELLAS

    function cambiarFondo(e) {
        let c = document.querySelector(".puntuacion");
        let porcentaje = parseInt(e.target.value) * 20;
        c.style.background =
            "linear-gradient( 90deg,rgba(164, 145, 59, 1)" +
            porcentaje +
            "%, rgba(163, 163, 163, 1)" +
            porcentaje +
            "%)";
    }

    let radioBtns = document.querySelectorAll('input[name="puntuacion"]');
    radioBtns.forEach((radio) => {
        radio.addEventListener("click", cambiarFondo);
    });
});