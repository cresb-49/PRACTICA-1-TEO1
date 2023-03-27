document.getElementById("logOutForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            window.location.href = 'http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php';
            console.log(xhr.responseText); 
        }
    };
    //Recogemos los datos del formulario en JSON
    let formDataJson = Object.fromEntries(new FormData(event.target));
    //Son agregados a otro objeto que asigna el tipo de accion con sus parametros y lo convertimos a un string
    let response = JSON.stringify({'type':'LOGOUT','params':formDataJson});
    //Enviamos el JSON a php
    xhr.send(response);
});