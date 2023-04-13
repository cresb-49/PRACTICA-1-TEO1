
function openEditor(id) {
    let idDiv = "res-sugerencia-" + id;
    let idButton = "btn-sugerencia-" + id;

    let btn = document.getElementById(idButton);
    let x = document.getElementById(idDiv);

    if (x.style.display === "none") {
        btn.innerText = "Ocultar";
        x.style.display = "block";
    } else {
        btn.innerText = "Responder";
        x.style.display = "none";
    }
}

function actualizarSeccion(link) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Actualizar sección con la respuesta del servidor
            document.getElementById("contenerdorSugerencias").innerHTML = this.responseText;
        }
    };
    // Realizar petición al archivo PHP que actualizará la información
    xhttp.open("GET", link, true);
    xhttp.send();
}

document.addEventListener('DOMContentLoaded', function () {
    actualizarSeccion('http://localhost/PRACTICA-1-TEO1/PROYECTO/views/sugerencias/onlySugerencias.php');
});

function registroRespuesta(idForm) {
    let name = 'formRegistrarResSugerencia-' + idForm;
    document.getElementById(name).addEventListener("submit", function (event) {
        event.preventDefault(); // Evitar el envío del formulario normal
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/responseSugerenciaController.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // Manejar la respuesta del servidor
        xhr.onload = function () {
            if (xhr.status === 200) {
                let res = JSON.parse(xhr.responseText);
                if (res.status === 'OK') {
                    document.getElementById(name).reset();
                    actualizarSeccion('http://localhost/PRACTICA-1-TEO1/PROYECTO/views/sugerencias/onlySugerencias.php');
                }
                notificacionUsuario(res);
            }
        };
        //Recogemos los datos del formulario en JSON
        let formDataJson = Object.fromEntries(new FormData(event.target));
        //Son agregados a otro objeto que asigna el tipo de accion con sus parametros y lo convertimos a un string
        let response = JSON.stringify(formDataJson);
        //Enviamos el JSON a php
        xhr.send(response);
    });
}



function notificacionUsuario(response) {
    let contenedor = document.getElementById('contenedorNotificaciones');
    let alert = document.createElement('div');
    alert.setAttribute('class', 'alert alert-warning alert-dismissible fade show');
    alert.setAttribute('role', 'alert');
    let cont = '<strong>' + (response.status ? 'Respuesta registrada' : 'Error') + '</strong><br>' + response.mensaje + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    alert.innerHTML = cont;
    contenedor.appendChild(alert);
}