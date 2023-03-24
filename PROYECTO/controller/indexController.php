<?php
require_once('model/indexModel.php');
class indexController{

    private $model;

    public function __construct(){
        $this -> model = new indexModel();
    }

    //mostrar index
    static function index()
    {
        $model = new indexModel();
        $tema1 = $model -> mostrarComentariosT1();
        $tema1 = $model -> mostrarComentariosT2();
        $tema1 = $model -> mostrarComentariosT3();
        require_once('views/indexView.php');
    }

}