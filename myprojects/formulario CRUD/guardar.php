<?php 
	include 'conexion.php';//aqui se pone esto para no escribir la conexion a cada rato en cada archivo

	$nombre = $_POST['nombre'];//en caso de que se tenga un formulario aqui se reciben las variables
	$color = $_POST['color'];
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];

	// $ins = $con -> query("INSERT INTO pokemones (id,nombre,color,tipo) VALUES ('','pikachu','amarillo','electrico')");//insertar, aqui le damos la sentencia a seguir
	$ins = $con -> query("INSERT INTO pokemones (id,nombre,color,tipo) VALUES ('','$nombre','$color','$tipo')");//con formulario cambiamos la sentencia para que ahora guarde las variables recibidas
	if ($ins) {
		echo "guardo";
	}else{
		echo "no guardo";
	}
 ?>