var app = angular.module("MyFirstApp" ,[]);
app.controller("FirstController", function($scope){
	$scope.nombre = "Pokedann";
	$scope.nuevoComentario = {};
	$scope.comentarios = [
	{
		comentario: "aprendiendo angular?",
		username: "pokedann"
	},
	{
		comentario: "ni vas a aprender, no se que le haces",
		username: "anonimo"
	}
						];
	$scope.agregarComentario = function(nuevoComentario){
		$scope.comentarios.push(nuevoComentario);
		$scope.nuevoComentario = {};
	}
});