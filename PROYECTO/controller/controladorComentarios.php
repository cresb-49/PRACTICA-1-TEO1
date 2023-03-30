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
    $type = $datos->type;
    $usuario = $datos->formulario->usuario;
    $tema = $datos->formulario->tema;
    $comentario = $datos->formulario->comentario;

    $response = array('status' => 'OK', 'mensaje' => 'Se registro con exito el comentario');
    try {
        $db->saveComentario($tema, $usuario, $comentario);
    } catch (Exception $e) {
        $response = array('status' => 'ERROR', 'mensaje' => $e->getMessage());
    }
    $jResponse = json_encode($response);
    header('Content-Type: application/json');
    echo $jResponse;
}
