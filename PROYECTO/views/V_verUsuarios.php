<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($usuarios as $user) {
            echo "<tr>";
                echo "<td>Mark</td>";
                echo "<td>Otto</td>";
                echo "<td>@mdo</td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>
</body>
</html>