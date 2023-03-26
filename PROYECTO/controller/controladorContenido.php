<?php
if(isset($_GET['contenido'])){
    // Obtener el valor del parámetro 'contenido'
    $contenido = $_GET['contenido'];
    //$model = new database();
    switch ($contenido) {
        case 1:
            require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\contenidoAlimentacionController.php');
            contenidoAlimentacionController::mostrar();
            break;
        case 2:
            require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\contenidoAlimentacion.php');
            break;
        case 3:
            require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\contenidoAlimentacion.php');
            break;
        default:
            require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\indexController.php');
            indexController::index();
            break;
    }
}

if (isset($_POST['accion'])) {
    $contenido = $_POST['accion'];
    echo $contenido;
}
