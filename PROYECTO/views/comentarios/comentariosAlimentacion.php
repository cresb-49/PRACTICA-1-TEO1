<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
$db = new database();
$comentarios = $db->getComentariosTema1();
?>
<?php if (!empty($comentarios) > 0) { ?>
    <?php foreach ($comentarios[0] as $comentario) { ?>
        <div class="comment-container">
            <div class="comment-header">
                <h5 class="comment-author">
                    <?php echo $comentario['usuario'] ?>
                </h5>
                <span class="comment-date"><?php echo $comentario['fecha'] ?></span>
            </div>
            <p class="comment-text">
                <?php echo $comentario['contenido'] ?>
            </p>
        </div>
    <?php } ?>
<?php } ?>