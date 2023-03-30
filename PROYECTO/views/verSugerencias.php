<?php
session_start();
require('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>
<link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">
<br>
<div class="container comments-container">
    <?php foreach ($sugerencias[0] as $sugerencia) { ?>
        <div class="comment-container">
            <div class="comment-header">
                <input type="hidden" name="id" value="<?php echo $sugerencia['id'] ?>">
                <h5 class="comment-author"><?php echo $sugerencia['usuario'] ?></h5>
                <span class="comment-date"><?php echo $sugerencia['fecha'] ?></span>
            </div>
            <p class="comment-text">
                <?php echo $sugerencia['contenido'] ?>
            </p>
        </div>
    <?php } ?>
</div>
<?php require('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php'); ?>