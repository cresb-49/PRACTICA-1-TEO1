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
    $sugerencia = $datos->sugerencia;
    $usuario = 'usuario1';
    $response = array('status'=>'OK','mensaje'=>'La operacion se realizo con exito');
    try {
        $db -> saveSugerencia($sugerencia, $usuario);
    } catch (Exception $e) {
        $response = array('status'=> 'ERROR','mensaje'=> $e -> getMessage());
    }
    $jResponse = json_encode($response);
    //header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/');
    header('Content-Type: application/json');
    echo $jResponse;
}
