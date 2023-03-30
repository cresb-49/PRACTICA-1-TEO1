document.getElementById("formularioSugerencia").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/sugerenciasController.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            let res = JSON.parse(xhr.responseText);
            document.getElementById('formularioSugerencia').reset();
            if(res.status === 'OK'){
                activarAlerta("Sugerencia registrada!!!",res.mensaje.replace(/\\n/g, "<br>"));
            }else{
                activarAlerta("Error al enviar sugerencia!!!",res.mensaje.replace(/\\n/g, "<br>"));
            }
        }
    };
    // Enviar los datos del formulario al servidor
    let formDataJson = JSON.stringify(Object.fromEntries(new FormData(event.target)));
    xhr.send(formDataJson);
});

function activarAlerta(titulo,contenido) {
    let contenedor = document.getElementById('contenedor');
    let alert = document.createElement('div');
    alert.setAttribute('class','alert alert-warning alert-dismissible fade show');
    alert.setAttribute('role', 'alert');
    let cont = '<strong>'+titulo+'</strong><br>'+contenido+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    alert.innerHTML = cont;
    contenedor.appendChild(alert);
}