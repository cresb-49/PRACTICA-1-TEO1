<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = new database();
    if (isset($_GET['ver'])) {
        // Obtener el valor del parámetro 'contenido'
        $contenido = $_GET['ver'];

        switch ($contenido) {
            case 1:
                verSugerencias($db);
                break;
            default:
                require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\indexController.php');
                indexController::index();
                break;
        }
    }
}

function verSugerencias($db)
{
    $sugerencias = $db->getSugerencias();
    require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\verSugerencias.php');
}
