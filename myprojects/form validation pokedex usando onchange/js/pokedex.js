$(document).ready(function() { //cuando todo este listo, iniciara lo que esta adentro de la funcion

	$("#pok").change(function() { //al hacer clic en el boton pedido hara lo que esta adentro de la funcion

		$( document ).ajaxStart(function() {
		  $( "#loader" ).show();
		});

		$( document ).ajaxStop(function() {
		  $( "#loader" ).hide();
		});

		$.get("pokedex.php",{pokemon:$(this).val()},function(data){ //puede ser de cualquiera de las dos formas, directo o indirecto, para que reciba los datos que estan en pok, $.get("pokedex.php",{pokemon:$("#pok").val()},function(data)
			$("#imagen").html('<h3>Imagen</h3><img style="width:50%;" src="img/'+data.img+'">');//aqui le esta diciendo que obtenga el dato, lo imprima con html en el div indicado
			$("#habilidad").html('<h3>Habilidad</h3><p style="font-size: 16px;color: chartreuse;">'+data.habilidad+'</p>');
			$("#tipo").html('<h3>Tipo</h3><p style="font-size: 16px;color: chartreuse;">'+data.tipo+'</p>');
			},'json');//tienes que ponerle esto del json para que jquery sepa que esta recibiendo datos desde uno

		return false; //sirve para detener el proceso
	});
});