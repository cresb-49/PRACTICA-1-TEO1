<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maiz Blog</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
	<header class="p-3 text-bg-dark">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
					<h5 class="bi me-2">Maiz Blog</h5>
				</a>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/index.php" class="nav-link px-2 text-secondary">Inicio</a></li>

					<?php if (isset($_SESSION['rol'])) { ?>
						<?php if ($_SESSION['rol'] !== 'ADMIN') { ?>
							<li><a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/sugerencias.php" class="nav-link px-2 text-secondary">Sugerencias</a></li>
						<?php } else { ?>
							<li><a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/controller/verSugerenciasController.php?ver=1" class="nav-link px-2 text-secondary">Visualizar Sugerencias</a></li>
						<?php } ?>
					<?php } ?>
					<?php if (isset($_SESSION['rol'])) { ?>
						<?php if ($_SESSION['rol'] === 'ADMIN') { ?>
							<li><a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/registroAdmin.php" class="nav-link px-2 text-secondary">Registrar Admin</a></li>
						<?php } ?>
					<?php } ?>
					<?php if (isset($_SESSION['rol'])) { ?>
						<?php if ($_SESSION['rol'] === 'USUARIO') { ?>
							<li><a href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/verRespuestaSugerencias.php" class="nav-link px-2 text-secondary">Respuestas Sugerencias</a></li>
						<?php } ?>
					<?php } ?>
				</ul>

				<?php if (isset($_SESSION['username'])) { ?>
					<form id="logOutForm">
						<div class="text-end">
							<button type="submit" class="btn btn-outline-light me-2">Logout</button>
						</div>
					</form>
					<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/logOut.js"></script>
				<?php } else { ?>
					<div class="text-end">
						<a type="button" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/login.php" class="btn btn-outline-light me-2">Login / Sign-up</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</header>