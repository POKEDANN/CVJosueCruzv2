<?php 
include 'conexion.php';
$id = $_REQUEST['id'];//request porque viene por la URL
$sel = $con -> query()"SELECT * FROM pokemones where id='$id' ");
if($fila = $sel -> fetch_assoc()){
}	
 ?>
 <form action="update.php" method="post">
 	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="text" name="nombre" placeholder="Nombre del Pokemon" value="<?php echo $fila['nombre'] ?>"><br><br>
	<input type="text" name="color" placeholder="Color del Pokemon" value="<?php echo $fila['color'] ?>"><br><br>
	<input type="text" name="tipo" placeholder="Tipo del Pokemon" value="<?php echo $fila['tipo'] ?>"><br><br>
	<input type="submit" value="Actualizar">
 </form>