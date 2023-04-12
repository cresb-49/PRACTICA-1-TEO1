<?php
session_start();
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\model\database.php');
$db = new database();
$sugerencias = $db->getSugerencias();
?>
<?php if (isset($sugerencias[0])) { ?>
    <?php foreach ($sugerencias[0] as $sugerencia) { ?>
        <?php if ($sugerencia['response'] === 0) { ?>
            <div id="sugerenciasBlog">
                <div id="sugerencia-<?php echo $sugerencia['id'] ?>" class="comment-container">
                    <div class="comment-header">
                        <input type="hidden" name="id" value="<?php echo $sugerencia['id'] ?>">
                        <h5 class="comment-author"><?php echo $sugerencia['usuario'] ?></h5>
                        <span class="comment-date"><?php echo $sugerencia['fecha'] ?></span>
                    </div>
                    <p class="comment-text">
                        <?php echo $sugerencia['contenido'] ?>
                    </p>
                    <button onclick="openEditor(<?php echo $sugerencia['id'] ?>)" id="btn-sugerencia-<?php echo $sugerencia['id'] ?>" class="btn btn-secondary">Responder</button>
                    <div style="display: none;" id="res-sugerencia-<?php echo $sugerencia['id'] ?>">
                        <br>
                        <form id="formRegistrarResSugerencia-<?php echo $sugerencia['id'] ?>" >
                            <div class="container caja">
                                <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["username"] ?>">
                                <input type="hidden" name="sugerencia" id="sugerencia" value="<?php echo $sugerencia['id'] ?>">
                                <textarea name="respuesta" id="respuesta" class="form-control comentario comentario-pos" required></textarea>
                                <button onclick="registroRespuesta(<?php echo $sugerencia['id'] ?>)" class="comentario-pos button-comentario">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
<?php } else { ?>
    <div class="comment-container">
        <h3>Sin sugerencias :)</h3>
    </div>
<?php } ?>