<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');

class contenidoCulturaController{
    private $model;
    public function __construct(){
        $this -> model = new database();
    }

    static function mostrar(){
        $model = new database();
        $comentarios = $model -> getComentariosTema3();
        var_dump($comentarios);
        require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\contenidoCultura.php');
    }
}