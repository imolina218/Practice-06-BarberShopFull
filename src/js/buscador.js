document.addEventListener("DOMContentLoaded", function() {
    iniciarApp();
});

function iniciarApp() {
    buscarPorFecha();
}

function buscarPorFecha() {
    const fechainput = document.querySelector("#fecha");
    fechainput.addEventListener("input", function(event) {
        const fechaSeleccionada = event.target.value;

        window.location = `?fecha=${fechaSeleccionada}`;
    });
}
