<!DOCTYPE html>
<html lang="en">
<head>
	<!-- index.php/pokemon=lucario -->
	<meta charset="UTF-8">
	<title>Pokedex con json</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/pokedex.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/pokedex.css">
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form id="formulario">
						<h1>Hola, soy tu pokedex inteligente</h1>
						<h3>Por favor selecciona algun pokemon y podras ver su informacion:</h3>
						<select name="pokedex" id="pok">
							<option disabled selected value>Selecciona un pokemon:</option>
							<option value="lucario">Lucario</option>
							<option value="gastrodon">Gastrodon</option>
							<option value="rotom">Rotom</option>
							<option value="gallade">Gallade</option>
							<option value="snorunt">Snorunt</option>
							<option value="infernape">Infernape</option>
						</select>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-7" id="imagen">
					
				</div>
				<div class="col-sm-5">
					<div class="row">
						<div class="col-sm-12" id="loader">
							<img src="img/pokedex.gif">
						</div>
						<div class="col-sm-12" id="habilidad">
					
						</div>
						<div class="col-sm-12" id="tipo">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>