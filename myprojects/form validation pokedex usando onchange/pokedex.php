<?php
	ini_set('display_errors', 1);
	error_reporting(E_ERROR);//esto ayuda a que te enseñe los errores de php que tienes, tambien puedes ponerle E_ALL
    $pokemon = $_GET['pokemon']; //en este caso se cambia a get, se guarda en una variable para que jquery pueda obtenerla
    $pkx = array(
    	"lucario" => array (
    		"img" => "lucario.png",
    		"habilidad" => "impasible",
    		"tipo" => "peleador acero"),
    	"snorunt" => array (
    		"img" => "snorunt.png",
    		"habilidad" => "gelido",
    		"tipo" => "hielo"),
    	"gastrodon" => array (
    		"img" => "gastrodon.png",
    		"habilidad" => "viscosidad",
    		"tipo" => "tierra agua"),
    	"infernape" => array (
    		"img" => "infernape.png",
    		"habilidad" => "mar llamas",
    		"tipo" => "peleador fuego"),
    	"rotom" => array (
    		"img" => "rotom.jpg",
    		"habilidad" => "levitacion",
    		"tipo" => "electrico fantasma"),
    	"gallade" => array (
    		"img" => "gallade.png",
    		"habilidad" => "impasible",
    		"tipo" => "peleador psiquico"),
    );//aqui se hace el arreglo o json, de lo que va a enviar 
//$pkx['lucario']
	echo json_encode($pkx[$pokemon]);//le dice que le de las variables que estan en pkx, en este caso son arreglos, funciona por medio de index
?>