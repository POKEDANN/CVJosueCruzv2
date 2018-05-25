<?php include 'conexion.php'; ?><!-- incluimos nuestra conexion en cada archivo para poder consultar los datos de la BD -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario udemy</title>
</head>
<body>
	<h1>Formulario Udemy</h1>
	<form action="guardar.php" method="post">
		<input type="text" name="nombre" placeholder="Nombre del Pokemon"><br><br>
		<input type="text" name="color" placeholder="Color del Pokemon"><br><br>
		<input type="text" name="tipo" placeholder="Tipo del Pokemon"><br><br>
		<input type="submit" value="Enviar">
	</form>

	<table>
		<th>ID</th>
		<th>Nombre</th>
		<th>Color</th>
		<th>Tipo</th>
		<?php 

		$sel = $con -> query("SELECT * FROM pokemones");//aqui se hace el query para navegar a traves de los datos
		while ($fila = $sel -> fetch_assoc()){
		 ?>
		 <tr>
		 	<td><?php echo $fila['id'] ?></td>
		 	<td><?php echo $fila['nombre'] ?></td>
		 	<td><?php echo $fila['color'] ?></td>
		 	<td><?php echo $fila['tipo'] ?></td>
		 	<td><a href="actualizar.php?id?<?php echo $fila['id'] ?>">Actualizar</a></td>
		 	<td><a href="borrar.php?id=<?php echo $fila['id'] ?>">Eliminar</a></td>
		 </tr>
		 <?php } ?><!-- se pone la llave hasta el final para que acomode bien los datos hasta ya no encontrar ninguno -->
	</table>
</body>
</html>