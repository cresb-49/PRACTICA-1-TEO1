<?php
class indexModel{
    private $Modelo;
    private $db;

    public function __construct()
    {
        $this -> Modelo = array();
        $this -> db = new PDO('mysql:host=localhost;dbname=maizblog','root','');
    }

    public function mostrarComentariosT1(){
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 1';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        while($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)){
            $resultado = $fila;
        }
        return $resultado;
    }
    public function mostrarComentariosT2(){
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 2';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        while($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)){
            $resultado = $fila;
        }
        return $resultado;
    }
    public function mostrarComentariosT3(){
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 3';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        while($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)){
            $resultado = $fila;
        }
        return $resultado;
    }

}