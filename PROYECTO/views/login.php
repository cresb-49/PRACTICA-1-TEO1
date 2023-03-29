<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login / Sign-up</title>
	<link rel="stylesheet" href="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/css/login.css">
</head>

<?php
require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\header.php');
?>

<body>
	<br>
	<div class="container" id="contenedorLogin">
	</div>
	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
				In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<form id="formLogin">
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" name="user" type="text" class="input" required>
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" name="pass" type="password" class="input" data-type="password" required>
						</div>
						<br>
						<div class="group">
							<button type="submit" class="button btn btn-dark">Sign In</button>
						</div>
					</form>
					<div class="hr"></div>
				</div>
				<div class="sign-up-htm">
					<form id="formSignUp">
						<div class="group">
							<label for="email" class="label">Email</label>
							<input id="email" name="email" type="text" class="input" required>
						</div>
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" name="user" type="text" class="input" required>
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" name="pass" type="password" class="input" data-type="password" required>
						</div>
						<div class="group">
							<label for="pass2" class="label">Repeat Password</label>
							<input id="pass2" name="pass2" type="password" class="input" data-type="password" required>
						</div>
						<div class="group">
							<button type="submit" class="button btn btn-dark">Sign Up</button>
						</div>
					</form>
					<div class="hr"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="http://localhost/PRACTICA-1-TEO1/PROYECTO/views/js/loginSingUp.js"></script>
</body>

<?php
    require_once('C:\xampp\htdocs\PRACTICA-1-TEO1\PROYECTO\views\footer.php');
?>

</html>