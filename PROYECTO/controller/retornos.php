<?php
class Retornos
{
    public static function returnIndexIfLogin()
    {
        if (isset($_SESSION['username'])) {
            header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
        }
    }

    static function returnIndexIfNotLogin()
    {
        if (!(isset($_SESSION['username']))) {
            header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
        }
    }

    public static function returnIndexIfAdmin(){
         if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] === 'ADMIN') {
                header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
            }
        } else {
            header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
        }
    }   

    public static function returnIndexIfNotAdmin()
    {
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] !== 'ADMIN') {
                header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
            }
        } else {
            header('Location: http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php');
        }
    }
}
