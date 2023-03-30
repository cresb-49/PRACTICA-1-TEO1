<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
$database = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Conexion con la base de datos
    $db = new database();
    // Lee los datos enviados en el cuerpo de la petición
    //$data_in = file_get_contents('php://input');
    $data_in = $_POST['contenido'];
    $clasificacion = $db->getClasificacion($data_in);
    $contenido = $clasificacion['contenido'];
    $tema = $data_in;
    if ($data_in > 3) {
        //retornamos al inicio de la pagina
        require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\indexController.php');
        indexController::index();
    }
    require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\editorContenido.php');
}
