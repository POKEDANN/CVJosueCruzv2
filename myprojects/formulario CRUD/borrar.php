<?php 
include 'conexion.php';

$id = $_REQUEST['id'];

$del = $con -> query("DELETE FROM pokemones WHERE id = '$id' ");
if ($del) {
	echo echo "<script>
	location.href='formulario.php';
	</script>";
}else{
	echo "<script>
	alert('el registro no se pudo eliminar');
	location.href='formulario.php';
	</script>";
}
 ?>