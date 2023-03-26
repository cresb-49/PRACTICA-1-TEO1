<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
class indexController{

    private $model;

    public function __construct(){
        $this -> model = new database();
    }

    //mostrar index
    static function index()
    {
        $model = new database();
        $tema1 = $model -> mostrarComentariosT1();
        $tema2 = $model -> mostrarComentariosT2();
        $tema3 = $model -> mostrarComentariosT3();
        require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\indexView.php');
    }
}