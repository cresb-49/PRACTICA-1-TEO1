<?php

require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Conexion con la base de datos
    $db = new database();
    // Lee los datos enviados en el cuerpo de la petición
    $json = file_get_contents('php://input');
    // Convierte el JSON a un objeto PHP
    $datos = json_decode($json);
    // Accede a los valores del objeto
    $respuesta = $datos->respuesta;
    $id = $datos->sugerencia;
    $response = 1;
    $res = array('status' => 'OK', 'mensaje' => 'La operacion se realizo con exito');
    try {
        $db->updateSugerencia($response, $respuesta, $id);
    } catch (Exception $e) {
        $res = array('status' => 'ERROR', 'mensaje' => $e->getMessage());
    }
    $jResponse = json_encode($res);
    header('Content-Type: application/json');
    echo $jResponse;
}
