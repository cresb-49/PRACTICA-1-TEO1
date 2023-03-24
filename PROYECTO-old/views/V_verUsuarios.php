
<div class="container">
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">Username</th>
		  <th scope="col">Password</th>
		  <th scope="col">Nombre</th>
		  <th scope="col">Rol</th>
		</tr>
	  </thead>
	  <tbody>
		<?php
			foreach ($usuarios as $user) {
				echo "<tr>";
					echo "<td>".$user['username']."</td>";
					echo "<td>".$user['password']."</td>";
					echo "<td>".$user['nombre']."</td>";
					echo "<td>".$user['rol']."</td>";
				echo "</tr>";
			}
		?>
	  </tbody>
	</table>
</div>