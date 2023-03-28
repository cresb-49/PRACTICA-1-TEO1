<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');

class contenidoCombustibleController{
    private $model;
    public function __construct(){
        $this -> model = new database();
    }

    static function mostrar(){
        $model = new database();
        $comentarios = $model -> getComentariosTema2();
        $id =2;
        $clasificacion = $model -> getClasificacion($id);
        $contenido = $clasificacion['contenido'];
        require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\contenidoCombustible.php');
    }
}