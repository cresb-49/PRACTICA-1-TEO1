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
?>
    <link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">
    <br>
    <div id="contenerdorSugerencias" class="container comments-container">
        <?php if (isset($sugerencias)) { ?>
            <?php if (count($sugerencias) !== 0) { ?>
                <?php foreach ($sugerencias as $results) { ?>
                    <div class="comment-container">
                        <div class="comment-header">
                            <h5 class="comment-author">
                                <?php echo $results['creador'] ?>
                            </h5>
                            <span class="comment-date"><?php echo $results['fecha'] ?></span>
                        </div>
                        <strong>Sugerencia</strong>
                        <p class="comment-text">
                            <?php echo $results['sugerencia'] ?>
                        </p>
                        <div class="comment-header">
                            <h5 class="comment-author">
                                <?php echo $results['editor'] ?>
                            </h5>
                            <span class="comment-date"><?php echo $results['res_fecha'] ?></span>
                        </div>
                        <strong>Respuesta</strong>
                        <p class="comment-text">
                            <?php echo $results['respuesta'] ?>
                        </p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="comment-container">
                    <h3>Sin respuestas :)</h3>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="comment-container">
                <h3>Sin respuestas :)</h3>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<?php require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php'); ?>