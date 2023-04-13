<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\retornos.php');
Retornos::returnIndexIfNotLogin();
Retornos::returnIndexIfAdmin();
?>
<link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">
<br>
<div id="contenedor" class="container"></div>
<div class="container comments-container">
    <div class="comment-container">
        <div class="comment-header">
            <h5 class="comment-author">Retroalimentación de la página</h5>
        </div>
        <p class="comment-text">
            En este espacio plantea todas tus sugerencias para un mejor funcionamiento de la página, teniendo siempre en
            cuenta el respeto al momento de comunicar muchas gracias :)
        </p>
        <br>
        <form id="formularioSugerencia">
            <input type="hidden" name="usuario" value="<?php echo $_SESSION["username"] ?>">
            <div class="form-group mb-3">
                <label for="sugerencia">Comentarios</label>
                <textarea class="form-control" id="sugerencia" name="sugerencia" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-comentario">Enviar</button>
            <script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/sugerencias.js"></script>
        </form>
    </div>
</div>
<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php');
?>