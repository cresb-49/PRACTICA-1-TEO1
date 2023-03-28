<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>

<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Create the editor container -->
<br>
<form id="editorTexto" name="editorTexto">
    <input type="hidden" name="tema" id="tema" value="<?php echo $tema ?>">
    <div class="container">
        <div id="editor">
            <?php echo $contenido; ?>
        </div>
        <button type="submit" class="btn btn-secondary mt-3">Guardar</button>
    </div>
</form>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/editor.js"></script>

<?php require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php'); ?>