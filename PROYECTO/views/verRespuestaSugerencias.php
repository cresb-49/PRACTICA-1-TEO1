<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\controller\retornos.php');
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
Retornos::returnIndexIfNotLogin();
Retornos::returnIndexIfAdmin();

$database = new database();
if (isset($_SESSION['username'])) {
    $sugerencias = $database->getSugerenciasUser($_SESSION['username']);
    //TODO: realizar mejor precentacion de esta nueva pagina
?>
    <link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">
    <br>
    <div id="contenerdorSugerencias" class="container comments-container">
        <?php foreach ($sugerencias as $results) { ?>
            <div class="comment-container">
                <div class="comment-header">
                    <h5 class="comment-author">
                        <?php echo $results['usuario'] ?>
                    </h5>
                    <span class="comment-date"><?php echo $results['fecha'] ?></span>
                </div>
                <strong>Sugerencia</strong>
                <p class="comment-text">
                    <?php echo $results['contenido'] ?>
                </p>
                <strong>Respuesta</strong>
                <p class="comment-text">
                    <?php echo $results['respuesta'] ?>
                </p>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<?php require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php'); ?>