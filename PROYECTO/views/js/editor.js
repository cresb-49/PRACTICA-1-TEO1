var quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'font': []
            }],
            ['bold', 'italic', 'underline', 'strike'],
            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'align': []
            }],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'direction': 'rtl'
            }],
            [{
                'size': ['small', false, 'large', 'huge']
            }],
            ['link', 'image', 'video', 'blockquote', 'code-block'],
            ['clean']
        ]
    },
    theme: 'snow'
});

document.getElementById("editorTexto").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío del formulario normal
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/guardarContenido.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Manejar la respuesta del servidor
    xhr.onload = function () {
        if (xhr.status === 200) {
            let respuesta = JSON.parse(xhr.responseText);
            console.log(respuesta); 
            if(respuesta.status === 'OK'){
                //Redireccionamos a la pagina del contendio
                window.location.href = 'http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/controladorContenido.php?contenido='+respuesta.redireccion;
            }else{
                //Mostramos el error al usaurio
                alert(respuesta.mensaje);
            }
        }
    };
    //Recogemos los datos del formulario en JSON
    let formDataJson = Object.fromEntries(new FormData(event.target));
    //Agregamos el contenido que se ingreso en el editor de texto
    formDataJson['contenido'] = quill.container.firstChild.innerHTML;
    console.log(formDataJson);
    //Enviamos el JSON a php
    xhr.send(JSON.stringify(formDataJson));
});