<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\retornos.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['ver'])) {
        // Obtener el valor del parámetro 'contenido'
        $contenido = $_GET['ver'];
        switch ($contenido) {
            case 1:
                Retornos::returnIndexIfNotAdmin();
                require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\verSugerencias.php');
                break;
            default:
                require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\indexController.php');
                indexController::index();
                break;
        }
    }
}
