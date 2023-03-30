<?php

class database
{
    private $Modelo;
    private $db;

    public function __construct()
    {
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=maizblog', 'root', '');
    }

    public function mostrarComentariosT1()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 1';
        $response = $this->db->query($consulta);
        $resultado = null;
        if ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }

    public function getComentariosTema1()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 1 ORDER BY co.fecha DESC';
        $response = $this->db->query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index] = $fila;
            $index++;
        }
        return $resultado;
    }


    public function mostrarComentariosT2()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 2';
        $response = $this->db->query($consulta);
        $resultado = null;
        if ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }

    public function getComentariosTema2()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 2 ORDER BY co.fecha DESC';
        $response = $this->db->query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index] = $fila;
            $index++;
        }
        return $resultado;
    }

    public function mostrarComentariosT3()
    {
        $consulta = 'SELECT COUNT(*) as cantidad FROM comentarios as co WHERE co.clasificacion = 3';
        $response = $this->db->query($consulta);
        $resultado = null;
        if ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado = $fila[0]['cantidad'];
        }
        return $resultado;
    }

    public function getComentariosTema3()
    {
        $consulta = 'SELECT * FROM comentarios as co WHERE co.clasificacion = 3 ORDER BY co.fecha DESC';
        $response = $this->db->query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index] = $fila;
            $index++;
        }
        return $resultado;
    }

    //Guardado de las sugerencias de la pagina en la base de datos
    public function saveSugerencia($comentario, $usuario)
    {
        $fechaActual = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO sugerencias (usuario,fecha,contenido) VALUES(:valor1,:valor2,:valor3)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':valor1', $usuario);
        $stmt->bindParam(':valor2', $fechaActual);
        $stmt->bindParam(':valor3', $comentario);
        $stmt->execute();
    }

    //Obtener un usuario
    public function getUser($username)
    {
        $sql  = 'SELECT * FROM usuario WHERE username = :user';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user', $username);
        $stmt->execute();
        $resultado = null;
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($fila !== false && count($fila) > 0) {
            $resultado = $fila[0];
        }
        return $resultado;
    }

    //Registro de un nuevo usuario en el blog
    public function saveUsuario($usuario, $email, $password, $rol)
    {
        $sql = 'INSERT INTO usuario (username,email,password,rol) VALUES (:valor1,:valor2,:valor3,:valor4)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':valor1', $usuario);
        $stmt->bindParam(':valor2', $email);
        $stmt->bindParam(':valor3', $password);
        $stmt->bindParam(':valor4', $rol);
        $stmt->execute();
    }

    //Login en el sistema
    public function login($usuario, $password)
    {
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

    //Obtener las sugerencias del sistema
    public function getSugerencias()
    {
        $consulta = 'SELECT * FROM sugerencias AS su ORDER BY su.fecha DESC';
        $response = $this->db->query($consulta);
        $resultado = [];
        $index = 0;
        while ($fila = $response->FETCHALL(PDO::FETCH_ASSOC)) {
            $resultado[$index] = $fila;
            $index++;
        }
        return $resultado;
    }

    //registro de comentario
    public function saveComentario($tema, $usuario, $comentario)
    {
        $fechaActual = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO comentarios (usuario,fecha,clasificacion,contenido) VALUES (:valor1,:valor2,:valor3,:valor4)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':valor1', $usuario);
        $stmt->bindParam(':valor2', $fechaActual);
        $stmt->bindParam(':valor3', $tema);
        $stmt->bindParam(':valor4', $comentario);
        $stmt->execute();
    }


    //Guardar contendio del tema
    public function updateContenido($tema, $contenido)
    {
        $sql = 'UPDATE clasificacion SET contenido = :contenido WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':id', $tema);
        $stmt->execute();
    }

    //Obtener info clasificacion
    public function getClasificacion($tema)
    {
        $sql  = 'SELECT * FROM clasificacion WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $tema);
        $stmt->execute();
        $resultado = null;
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($fila !== false && count($fila) > 0) {
            $resultado = $fila[0];
        }
        return $resultado;
    }
}
