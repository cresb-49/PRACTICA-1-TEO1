<?php

require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\models\Conexion.php');
$con = new Conexion();
$usuarios = $con -> getUsuarios();
var_dump($usuarios);
require('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\V_verUsuarios.php');
?>
