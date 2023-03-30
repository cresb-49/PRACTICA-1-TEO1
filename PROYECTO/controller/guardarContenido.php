<?php

session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
$database = new database();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Conexion con la base de datos
    $db = new database();
    // Lee los datos enviados en el cuerpo de la petición
    $json = file_get_contents('php://input');
    // Convierte el JSON a un objeto PHP
    $datos = json_decode($json);
    $response = array('status' => 'OK', 'mensaje' => 'La operacion se realizo con exito', 'redireccion' => $datos->tema);
    try {
        $database->updateContenido($datos->tema, $datos->contenido);
    } catch (Exception $ex) {
        $response = array('status' => 'ERROR', 'mensaje' => $ex->getMessage(), 'redireccion' => null);
    }
    $jResponse = json_encode($response);
    header('Content-Type: application/json');
    echo $jResponse;
}
