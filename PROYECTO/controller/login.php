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

    $response = array('status'=>'OK','mensaje'=>'Datos recibidos');

    if ($datos->type === 'LOG') {
        $result = $db -> login($datos->params->user, $datos->params->pass);
        if ($result == null) {
            //Estructura de la respuesta para la vista
            $response = array('status'=>'ERROR','mensaje'=>'El usuario o contrasena son incorrectos');
        } else {
            $user = $result['username'];
            $rol = $result['rol'];
            $_SESSION["username"] = $user;
            $_SESSION["rol"] = $rol;
            //Estructura de la respuesta para la vista
            $response = array('status'=>'OK','mensaje'=>'Log-in');
        }
    } elseif ($datos->type === 'LOGOUT') {
        session_unset();
        session_destroy();
        $response = array('status'=>'OK','mensaje'=>'Session Cerrada');
    } elseif ($datos->type === 'SIGN') {
        //Informaciones para el usaurio
        $info1 = "Las direcciones de correo electronico validas son aquellas que comiencen con una cadena de caracteres alfanumericos, seguida de un signo \"@\" y una cadena de caracteres alfanumericos o guiones, seguida de un punto y dos o mas caracteres alfabeticos.";
        $info2 = "Son validos los nombres de usuario que contengan unicamente letras mayusculas y minusculas, numeros y guiones bajos (underscore), y que tengan una longitud de entre 3 y 16 caracteres.";
        $info3 = "La contrasena debe tener entre 8 y 15 caracteres, al menos una letra mayuscula, una letra minuscula, un digito, ningun espacio en blanco y al menos un caracter especial: @$!%#*?&";
        //Expreciones regulares de validacion de datos
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
        if (($datos->params->pass !== $datos->params->pass2)) {
            $mensaje = $mensaje . 'Las contrasenas deben ser iguales' . '\n';
        }
        if (empty($mensaje)) {
            $response = array('status'=>'OK','mensaje'=>'Se registro con exito en el blog');
        } else {
            $response = array('status'=>'ERROR','mensaje'=>$mensaje);
        }
    }
    //Empaquetado y envio de informacion a la vista
    $jResponse = json_encode($response);
    header('Content-Type: application/json');
    echo $jResponse;
}
