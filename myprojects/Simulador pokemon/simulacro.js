alert("Bienvenido al Simulador de Simulacros Pokemon, te daremos un escenario al azar para comenzar tu entrenamiento:");

function numeroRandom(range){
	return Math.round(Math.random() * range);
}

var pokemonTeam = ["Pikachu","Charizard","Bulbasaur","Squirtle","Muk","Heracross"];
var pokemonGym = ["Dragonite","Gyarados","Mewtwo","Lucario","Arcanine","Chansey"];
var pokemonElegido = pokemonTeam[numeroRandom(pokemonTeam.length - 1)];
var escenariosPokemon = numeroRandom(3);
var resultado = numeroRandom(2);
alert("Entrando al escenario " + escenariosPokemon);
switch(escenariosPokemon){
	case 0:
	alert("Tu pokemon esta envenenado, necesitas correr hacia un centro pokemon pero un Cazador pokemon aparece y quiere robarte a tu pokemon porque es unico y detergente, sin ver lanzas al primer pokemon que tomas:");
	alert("Despues de gritarle y decirle que tienes prisa, el pokemon que eliges es: " + pokemonElegido);
	if(resultado === 0){
	alert("El ataque que elegiste no era super efectivo, asi que pierdes y tu pokemon se muere envenenado");
	}else if (resultado > 0){
	alert("El ataque que elegiste fue super efectivo, asi que ganaste en un solo turno y llegas a tiempo al centro pokemon");
	}
	break;

	case 1:
	alert("Estas en una batalla cualquiera, tu oponente elige a un pokemon de fuego, tu llamas un pokemon al azar:");
	alert("Confiado el pokemon que has elegido es: " + pokemonElegido);
	if(pokemonElegido == "Pikachu" || pokemonElegido == "Squirtle" || pokemonElegido == "Muk"){
		alert("El pokemon elegido gana por su tipo, asi que ganaste");
	} else {
		alert("El pokemon elegido pierde por su tipo, asi que perdiste");
	}
	break;

	case 2:
	alert("Estas en el 8 gimnasio, sera una batalla 3 vs 3:");
	pokemonTeam.sort( function() { return 0.5 - Math.random() } );
	alert("Confiado el pokemon que has elegido es: " + pokemonTeam[0] + " y " + pokemonTeam[1] + " y " + pokemonTeam[2]);
	pokemonGym.sort( function() { return 0.5 - Math.random() } );
	alert("El lider de gimnasio ha escogido a: "+ pokemonGym[0] + " y " + pokemonGym[1] + " y " + pokemonGym[2]);
	if(resultado === 0){
	alert("El lider de gimnasio era muy fuerte, suerte para la proxima");
	} else if (resultado > 0){
	alert("La batalla fue feroz pero has ganado tu ultima medalla de gimnasio");
	}
	break;

	case 3:
	alert("Un miembro del equipo Rocket esta robando un centro Pokemon, lo retas y el te desafia con un pokemon venenoso:");
	alert("Sin saber que hacer llamas al primer pokemon de la primer pokebola que tomaste el cual fue: " + pokemonElegido);
	if(resultado === 0){
	alert("Gracias a tu incompetencia hay un centro Pokemon menos en el mundo");
	} else if (resultado > 0){
	alert("Has salvado el centro pokemon y muchos se acercan para agradecerte");
	}
	break;

	default:
	alert("Eres tan genial que no necesitas entrenamiento, hasta la proxima");
}