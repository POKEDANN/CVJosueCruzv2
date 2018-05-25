<?php
	require('rb.php');

	R::setup( 'mysql:host=localhost;dbname=webapp', 'root', '' );//primero se crea la BD
	//con todos sus datos correspondientes


	$new_report = R::dispense('reporte'); //crea un nuevo row

	$pokeSel = $_POST['pokeSel'];
	$color = $_POST['color'];
	$ataque = $_POST['ataque'];
	$motivo = $_POST['motivo'];

	echo 'pokeSel: ' . $pokeSel . '<br>';
	echo 'color: ' . $color . '<br>';
	echo 'ataque: ' . $ataque . '<br>';
	echo 'motivo: ' . $motivo . '<br>';

	$new_report->pokeSel = $pokeSel; //asi se ponen los datos y como los guardara en el row
	$new_report->color = $color;
	$new_report->ataque = $ataque;
	$new_report->motivo = $motivo;

	R::store($new_report); //aqui almacena los datos en la BD
?>