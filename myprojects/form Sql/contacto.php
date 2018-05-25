<?php
	include_once("ManejadorMySql.php");

	$name = $_POST['name'];
  	$email = $_POST['email'];
  	$cel = $_POST['cel'];
  	$horario = $_POST['horario'];
  	$sucursal = $_POST['sucursal'];

  	$horarios = 0;
  	foreach ($horario as $value) {
  		$horarios = $horarios | $value;
  	}

	$db = new ManejadorMySql();
	$conection = $db->abrirConexion();
	// if($conection !== true) {
	// 	echo($conection);
	// 	exit;
	// }

	// echo("<pre>");
	// print_r($db->getarrayOf("select * from clientes"));
	// echo("</pre>");

	$insertar = $db->saveData("insert into clientes(nombre_apellido,email,celular,horario,sucursal) values ('$name','$email','$cel','$horarios','$sucursal')");

	// $consultar = $db->getarrayOf("select * from clientes");
	// $temporal = 0;
	// foreach ($consultar as $value) {
	// 	// if ($key = 'horario') {
	// 	// 	echo("<pre>");
	// 	// 	echo($value->horario);
	// 		echo '<br>';
	// 		if ($value->horario & 1) {
	// 			echo " Mañana";
	// 		}
	// 		if ($value->horario & 2) {
	// 			echo " Tarde";
	// 		}
	// 		if ($value->horario & 4) {
	// 			echo " Noche";
	// 		}
	// 	// }
	// }

	// // if(true === $insertar) {
	// // 	echo "dato guardado!";
	// // }

	$db->cerrarConexion();
?>
