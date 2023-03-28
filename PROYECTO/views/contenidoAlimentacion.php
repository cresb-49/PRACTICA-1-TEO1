<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>

<link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">

<div class="container">
    <br>
    <?php echo $contenido ?>
    <br>
    <h3>Comentarios</h3>
</div>
<?php if (isset($_SESSION['username'])) { ?>
<form id="formRegistrarComentario">
    <div class="container caja">
        <input type="hidden" name="usuario" id="usuario"
            value="<?php echo $_SESSION["username"] ?>">
        <input type="hidden" name="tema" id="tema"
            value="<?php echo $id ?>">
        <textarea name="comentario" id="comentario" class="form-control comentario comentario-pos" required></textarea>
        <button type="submit" class="comentario-pos button-comentario">Enviar</button>
    </div>
</form>
<?php } ?>
<br>
<div class="container comments-container">
    <?php if (!empty($comentarios)>0) { ?>
    <?php foreach ($comentarios[0] as $comentario) { ?>
    <div class="comment-container">
        <div class="comment-header">
            <h5 class="comment-author">
                <?php echo $comentario['usuario'] ?>
            </h5>
            <span
                class="comment-date"><?php echo $comentario['fecha'] ?></span>
        </div>
        <p class="comment-text">
            <?php echo $comentario['contenido'] ?>
        </p>
    </div>
    <?php } ?>
    <?php } ?>
</div>
<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/registroComentario.js"></script>
<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php');
?>