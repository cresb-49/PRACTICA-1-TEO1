document.getElementById("formLogin").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            console.log(response);
            if(response.status === 'OK'){
                window.location.href = 'http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php';
            }else{
                //Mostramos el error al usuario
                activarAlerta("Error de inicio de session!!!",response.mensaje.replace(/\\n/g, "<br>"));
            }
        }
    };
    //Recogemos los datos del formulario en JSON
    let formDataJson = Object.fromEntries(new FormData(event.target));
    //Son agregados a otro objeto que asigna el tipo de accion con sus parametros y lo convertimos a un string
    let response = JSON.stringify({'type':'LOG','params':formDataJson});
    //Enviamos el JSON a php
    xhr.send(response);
});

document.getElementById("formSignUp").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            let res = JSON.parse(xhr.responseText);
            if(res.status === 'ERROR'){
                activarAlerta("Error al registrarse!!!",res.mensaje.replace(/\\n/g, "<br>"));
            }else{
                activarAlerta("Registro Exitoso!!!",res.mensaje.replace(/\\n/g, "<br>"));
                document.getElementById('formSignUp').reset();
            }
        }
    };
    //Recogemos los datos del formulario en JSON
    let formDataJson = Object.fromEntries(new FormData(event.target));
    //Son agregados a otro objeto que asigna el tipo de accion con sus parametros y lo convertimos a un string
    let response = JSON.stringify({'type':'SIGN','params':formDataJson});
    //Enviamos el JSON a php
    xhr.send(response);
});


function activarAlerta(titulo,contenido) {
    let contenedor = document.getElementById('contenedorLogin');
    let alert = document.createElement('div');
    alert.setAttribute('class','alert alert-warning alert-dismissible fade show');
    alert.setAttribute('role', 'alert');
    let cont = '<strong>'+titulo+'</strong><br>'+contenido+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    alert.innerHTML = cont;
    contenedor.appendChild(alert);
}