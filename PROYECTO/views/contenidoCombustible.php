<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>

<link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/comentarios.css">

<div class="container">
    <br>
    <h1>Alimentación</h1>
    <br>
    <p>
        El maíz es un alimento básico y versátil que se ha utilizado en todo el mundo durante miles de años. Se cree que
        el maíz se originó en América Central hace más de 5,000 años y desde entonces se ha convertido en un alimento
        básico en muchas culturas. A continuación, se describen algunos aspectos importantes del maíz como alimento.
        <br><br>
        Composición nutricional del maíz:
        <br><br>
        El maíz es una buena fuente de carbohidratos complejos, fibra, vitaminas y minerales esenciales. Además,
        contiene proteínas, grasas y antioxidantes. Unos 100 gramos de maíz proporcionan alrededor de 86 calorías, 18,7
        gramos de carbohidratos, 2,7 gramos de proteínas, 1,2 gramos de grasas y 2,7 gramos de fibra. Además, el maíz es
        una buena fuente de vitaminas B, incluyendo tiamina, niacina, ácido fólico y vitamina B6, así como de minerales
        como el magnesio, el fósforo y el potasio.
        <br><br>
        Beneficios para la salud:
        <br><br>
        El maíz tiene varios beneficios para la salud debido a su contenido nutricional. Los carbohidratos complejos
        presentes en el maíz se digieren lentamente, lo que ayuda a mantener los niveles de azúcar en la sangre
        estables. La fibra presente en el maíz también es beneficiosa para la salud digestiva y puede reducir el riesgo
        de enfermedades cardiovasculares y cáncer de colon. Además, los antioxidantes presentes en el maíz pueden ayudar
        a proteger contra el daño celular y reducir el riesgo de enfermedades crónicas.
        <br><br>
        Preparación y consumo:
        <br><br>
        El maíz se puede preparar de muchas maneras, y es un ingrediente básico en la cocina de muchas culturas. Se
        puede cocinar en agua hirviendo, asarse, freír o hornear, y se puede servir en forma de mazorcas, granos o
        tortillas. Además, el maíz es un ingrediente común en muchas sopas, guisos, ensaladas, postres y bebidas.
    </p>
    <h3>Comentarios</h3>
</div>
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
<br>
<div class="container comments-container">

    <div class="comment-container">
        <div class="comment-header">
            <h5 class="comment-author">Nombre del autor</h5>
            <span class="comment-date">Fecha del comentario</span>
        </div>
        <p class="comment-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id ligula
            eu tellus ultricies ullamcorper. Vestibulum id dolor vel elit congue
            accumsan. Nullam euismod, nisl sed dignissim pretium, nulla erat varius
            nulla, vitae blandit lorem velit ac sapien. Vestibulum ullamcorper ex
            quam, quis consectetur mauris pellentesque vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus id ligula
            eu tellus ultricies ullamcorper. Vestibulum id dolor vel elit congue
            accumsan. Nullam euismod, nisl sed dignissim pretium, nulla erat varius
            nulla, vitae blandit lorem velit ac sapien. Vestibulum ullamcorper ex
            quam, quis consectetur mauris pellentesque vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus id ligula
            eu tellus ultricies ullamcorper. Vestibulum id dolor vel elit congue
            accumsan. Nullam euismod, nisl sed dignissim pretium, nulla erat varius
            nulla, vitae blandit lorem velit ac sapien. Vestibulum ullamcorper ex
            quam, quis consectetur mauris pellentesque vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus id ligula
            eu tellus ultricies ullamcorper. Vestibulum id dolor vel elit congue
            accumsan. Nullam euismod, nisl sed dignissim pretium, nulla erat varius
            nulla, vitae blandit lorem velit ac sapien. Vestibulum ullamcorper ex
            quam, quis consectetur mauris pellentesque vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus id ligula
            eu tellus ultricies ullamcorper. Vestibulum id dolor vel elit congue
            accumsan. Nullam euismod, nisl sed dignissim pretium, nulla erat varius
            nulla, vitae blandit lorem velit ac sapien. Vestibulum ullamcorper ex
            quam, quis consectetur mauris pellentesque vitae.
        </p>
    </div>
</div>
<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/registroComentario.js"></script>
<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php');
?>