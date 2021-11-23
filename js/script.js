"use strict";

document.addEventListener("DOMContentLoaded", () => {
    const menu = document.querySelector(".burgerMenu");

    menu.addEventListener("click", () => {
        menu.classList.toggle("open");
    });
});