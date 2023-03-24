<?php
require_once('model/database.php');
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
        require_once('views/indexView.php');
    }

}