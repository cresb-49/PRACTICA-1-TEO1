<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\retornos.php');
Retornos::returnIndexIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Sign-up</title>
    <link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/login.css">
</head>

<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>

<body>
    <br>
    <div class="container" id="contenedorLogin">
    </div>
    <div class="login-wrap">
        <div class="login-html">
            <legend>Registro de Administrador</legend>
            <form id="formAdmin" name="formAdmin">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <div class="mb-3">
                    <label for="pass2" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="pass2" name="pass2">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/formAdmin.js"></script>
<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php');
?>
</html>