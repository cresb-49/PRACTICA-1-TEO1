<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');

class contenidoAlimentacionController{
    
    private $model;

    public function __construct(){
        $this -> model = new database();
    }

    static function mostrar(){
        $model = new database();
        $comentarios = $model -> getComentariosTema1();
        var_dump($comentarios);
        require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\contenidoAlimentacion.php');
    }
}