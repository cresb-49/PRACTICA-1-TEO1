try{
    document.getElementById("formRegistrarComentario").addEventListener("submit", function (event) {
        event.preventDefault(); // Evitar el envío del formulario normal
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/controladorComentarios.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // Manejar la respuesta del servidor
        xhr.onload = function () {
            if (xhr.status === 200) {
                let textarea = document.getElementById('comentario');
                textarea.value = '';
                actualizarComentarios(document.getElementById('temaId').value);
            }
        };
        //Recogemos los datos del formulario en JSON
        let formDataJson = Object.fromEntries(new FormData(event.target));
        //Son agregados a otro objeto que asigna el tipo de accion con sus parametros y lo convertimos a un string
        let response = JSON.stringify({ 'type': 'COMMENT', 'formulario': formDataJson });
        //Enviamos el JSON a php
        xhr.send(response);
    });
}catch(ex){}

function actualizarComentarios(tema) {
    if (tema === '1') {
        actualizarSeccion('http://localhost/PRACTICA-1-TEO1/PROYECTO/views/comentarios/comentariosAlimentacion.php');
    } else if (tema === '2') {
        actualizarSeccion('http://localhost/PRACTICA-1-TEO1/PROYECTO/views/comentarios/comentariosCombustible.php');
    } else if (tema === '3') {
        actualizarSeccion('http://localhost/PRACTICA-1-TEO1/PROYECTO/views/comentarios/comentariosCultura.php');
    } else {
        console.log('Opcion perdida: ' + tema);
    }
}
function actualizarSeccion(link) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Actualizar sección con la respuesta del servidor
            document.getElementById("comentariosTema").innerHTML = this.responseText;
        }
    };
    // Realizar petición al archivo PHP que actualizará la información
    xhttp.open("GET", link, true);
    xhttp.send();
}

document.addEventListener('DOMContentLoaded', function () {
    actualizarComentarios(document.getElementById('temaId').value);
});
