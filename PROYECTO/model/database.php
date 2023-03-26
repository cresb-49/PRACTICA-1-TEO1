<?php

class database
{
    private $Modelo;
    private $db;

    public function __construct()
    {
        $this -> Modelo = array();
        $this -> db = new PDO('mysql:host=localhost;dbname=maizblog', 'root', '');
    }

    public function mostrarComentariosT1()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 1';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        if ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }

    public function getComntariosTema1()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 1';
        $response = $this-> db -> query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index]=$fila;
            $index ++;
        }
        return $resultado;
    }


    public function mostrarComentariosT2()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 2';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        if ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }
    public function mostrarComentariosT3()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 3';
        $response = $this -> db -> query($consulta);
        $resultado = null;
        if ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }
}
