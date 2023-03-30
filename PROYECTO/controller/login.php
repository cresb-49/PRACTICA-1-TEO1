<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Conexion con la base de datos
    $db = new database();
    // Lee los datos enviados en el cuerpo de la petición
    $json = file_get_contents('php://input');
    // Convierte el JSON a un objeto PHP
    $datos = json_decode($json);

    $response = array('status' => 'ERROR', 'mensaje' => 'Accion no especificada');

    if ($datos->type === 'LOG') {
        $result = $db->login($datos->params->user, $datos->params->pass);
        if ($result == null) {
            //Estructura de la respuesta para la vista
            $response = array('status' => 'ERROR', 'mensaje' => 'El usuario o contraseña son incorrectos');
        } else {
            $user = $result['username'];
            $rol = $result['rol'];
            $_SESSION["username"] = $user;
            $_SESSION["rol"] = $rol;
            //Estructura de la respuesta para la vista
            $response = array('status' => 'OK', 'mensaje' => 'Log-in');
        }
    } elseif ($datos->type === 'LOGOUT') {
        session_unset();
        session_destroy();
        $response = array('status' => 'OK', 'mensaje' => 'Session Cerrada');
    } elseif ($datos->type === 'SIGN') {
        $mensaje = verficacion($datos);

        if (empty($mensaje)) {
            $response = registroUsuario($datos, $db, 'USUARIO', 'Se registro con exito el usuario en el blog');
        } else {
            $response = array('status' => 'ERROR', 'mensaje' => $mensaje);
        }
    } elseif ($datos->type === 'SIGN_ADMIN') {
        $mensaje = verficacion($datos);

        if (empty($mensaje)) {
            $response = registroUsuario($datos, $db, 'ADMIN', 'Se registro con exito el administrador en el blog');
        } else {
            $response = array('status' => 'ERROR', 'mensaje' => $mensaje);
        }
    }
    //Empaquetado y envio de informacion a la vista
    $jResponse = json_encode($response);
    header('Content-Type: application/json');
    echo $jResponse;
}

function registroUsuario($datos, $db, $rol, $okMensaje)
{
    $response = array('status' => 'ERROR', 'mensaje' => 'Accion no especificada');
    try {
        $prevUser = $db->getUser($datos->params->user);
        if ($prevUser === null) {
            $db->saveUsuario($datos->params->user, $datos->params->email, $datos->params->pass, $rol);
            $response = array('status' => 'OK', 'mensaje' => $okMensaje);
        } else {
            $response = array('status' => 'ERROR', 'mensaje' => 'El usuario "' . $datos->params->user . '" ya esta en uso en el blog');
        }
    } catch (PDOException $ex) {
        if ($ex->getCode() === '23000') {
            $response = array('status' => 'ERROR', 'mensaje' => 'El email "' . $datos->params->email . '" ya esta en uso en el blog');
        } else {
            $response = array('status' => 'ERROR', 'mensaje' => 'Error con la base de datos, codigo: ' . $ex->getCode());
        }
    }
    return $response;
}


function verficacion($datos)
{
    //Informaciones para el usaurio
    $info1 = "- Direccion de correo electrónico no válida, ejemplo example@email.com";
    $info2 = "- Los nombres de usuario válidos contienen mayúsculas y minúsculas, números y guiones bajos (underscore), y deben tener entre 3 y 16 caracteres de longitud.";
    $info3 = "- Una contraseña válida tiene: 8-15 caracteres, 1 mayúscula, 1 minúscula, 1 número, sin espacios y con al menos 1 caracter especial (@$!%#*?&).";

    $mensaje = "";
    //Validacion del correo electronico
    if (!(preg_match('/^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', $datos->params->email))) {
        $mensaje = $mensaje . $info1 . '\n';
    }
    //Validacion del nombre de usuario
    if (!(preg_match('/^[a-zA-Z0-9_]{3,16}$/', $datos->params->user))) {
        $mensaje = $mensaje . $info2 . '\n';
    }
    //Validacion de password
    if (!(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,15}$/', $datos->params->pass))) {
        $mensaje = $mensaje . $info3 . '\n';
    }
    //Verificar que las paswords sean iguales
    if ($datos->params->pass !== $datos->params->pass2) {
        $mensaje = $mensaje . 'Las contraseñas deben ser iguales' . '\n';
    }
    return $mensaje;
}
