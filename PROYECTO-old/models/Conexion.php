<?php
class Conexion
{
    private $conn;
    
    
    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maizblog";
        $this -> conn = new mysqli($servername, $username, $password, $dbname);
    }

    // Check connection

    public function getUsuarios()
    {
        $query = $this -> conn -> query('SELECT * FROM usuario');

        $retorno = [];
        $index = 0;
        while ($fila = $query -> fetch_assoc()) {
            $retorno[$index] = $fila;
            $index++;
        }
        return $retorno;
    }

    public function getCantidadComentariosTema1()
    {
        $query =  $this -> conn -> query(
            'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 1'
        );
        $retorno = 0;

        if ($fila = $query -> fetch_assoc()) {
            $retorno = $fila["cantidad"];
        }
        var_dump($retorno);
        return $retorno;
    }

	public function getCantidadComentariosTema2()
    {
        $query =  $this -> conn -> query(
            'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 2'
        );
        $retorno = 0;

        if ($fila = $query -> fetch_assoc()) {
            $retorno = $fila["cantidad"];
        }
        return $retorno;
    }

	public function getCantidadComentariosTema3()
    {
        $query =  $this -> conn -> query(
            'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 3'
        );
        $retorno = 0;

        if ($fila = $query -> fetch_assoc()) {
            $retorno = $fila["cantidad"];
        }
        return $retorno;
    }
}
