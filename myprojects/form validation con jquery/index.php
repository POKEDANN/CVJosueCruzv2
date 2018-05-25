<!doctype html>
<html lang="en">
<head>
<style>
	.rojo{color: red;}
	.azul{color: blue;background-color: red;}
</style>
	<meta charset="UTF-8">
	<title>form jquery</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#mostrar").hide();
			$("#sub").on("click",function(){
				var formdata = $("#formulario").serialize();
				$("#mostrar").show().addClass("rojo");
				if (empty("#colorIn")) {
					$array = array("message" => "error");
				} else {
					$array = array("message" => "exito");
				}$.post("report.php",formdata,function(data){
					// $("#mostrar").html(data);
					$("#formulario").hide();
				},"json");
				return false;
			});
		})
	</script>
</head>
<body>
	<form id="formulario">
		<h1>Inventa un pokemon</h1>
		<p>¿Como lo imaginas?</p>
		<select name="pokeSel" id="pokeSelect">
			<option value="redondo">Redondo</option>
			<option value="cuadrado">Cuadrado</option>
			<option value="triangulo">Triangulo</option>
		</select><br>
		<p>¿De que color?</p>
			<input type="text" name="color" id="colorIn">
			<br>
		<p>¿Cuantos ataques tiene?</p>
		<label><input type="radio" name="ataque" value="1">1</label>
		<label><input type="radio" name="ataque" value="2">2</label>
		<label><input type="radio" name="ataque" value="3">3</label>
		<label><input type="radio" name="ataque" value="4">4</label>
		<br>
		¿Con que motivos lo usaras?<br>
		<textarea name="motivo" cols="30" rows="10"></textarea>
		<br>
	</form>
	<div id="mostrar">
		<h1>Gracias por tus respuestas, las revisaremos y estaremos en contacto contigo muy pronto</h1>
	</div>
</body>
</html>