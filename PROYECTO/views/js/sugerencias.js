//TODO: realizar verificacion de campos
document.getElementById("formularioSugerencia").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/sugerenciasController.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // aquí se muestra la respuesta del servidor
        }
    };
    // Enviar los datos del formulario al servidor
    let formDataJson = JSON.stringify(Object.fromEntries(new FormData(event.target)));
    xhr.send(formDataJson);
});