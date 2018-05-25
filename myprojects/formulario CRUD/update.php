<?php 
include 'conexion.php';

$id = $_POST['id'];
$id = $_POST['nombre'];
$id = $_POST['color'];
$id = $_POST['tipo'];

$up = $con -> query("UPDATE pokemon SET nombre='$nombre', paterno='$paterno', materno='$materno' WHERE id='$id' ");
if ($up) {
	echo "<script>
	location.href='formulario.php';
	</script>";
}else{
	echo "<script>
	location.href='actualizar.php?id=".$id."';
	</script>";
}
 ?>
