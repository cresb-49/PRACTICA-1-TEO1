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

    public function getComentariosTema1()
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

    public function getComentariosTema2()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 2';
        $response = $this-> db -> query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index]=$fila;
            $index ++;
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

    public function getComentariosTema3()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 3';
        $response = $this-> db -> query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response -> FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index]=$fila;
            $index ++;
        }
        return $resultado;
    }

    //Guardado de las sugerencias de la pagina en la base de datos
    public function saveSugerencia($comentario, $usuario)
    {
        $fechaActual = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO sugerencias (usuario,fecha,contenido) VALUES(:valor1,:valor2,:valor3)';
        $stmt = $this -> db -> prepare($sql);
        $stmt -> bindParam(':valor1', $usuario);
        $stmt -> bindParam(':valor2', $fechaActual);
        $stmt -> bindParam(':valor3', $comentario);
        $stmt -> execute();
    }

    //Registro de un nuevo usuario en el blog
    public function saveUsuario($email,$usuario,$password){
        $sql = 'INSERT INTO sugerencias (usuario,fecha,contenido) VALUES(:valor1,:valor2,:valor3)';

        $stmt = $this -> db -> prepare($sql);
        $stmt -> bindParam(':valor1', $usuario);
        $stmt -> bindParam(':valor2', $fechaActual);
        $stmt -> bindParam(':valor3', $comentario);
        $stmt -> execute();
    }

    //Login en el sistema
    public function login($usuario, $password) {
        $sql = 'SELECT u.username, u.rol FROM usuario as u WHERE u.username = :user AND u.password = :pass';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user', $usuario);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
    
        $resultado = null;
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($fila !== false && count($fila) > 0) {
            $resultado = $fila[0];
        }
        return $resultado;
    }
}