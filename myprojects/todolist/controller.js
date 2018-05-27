angular.module("ToDoList",["LocalStorageModule"])
.controller("ToDoController",function($scope,localStorageService){
	if (localStorageService.get("angular-todolist")) {
		$scope.todo = localStorageService.get("angular-todolist");
	}
	else{
		$scope.todo = [];
	}
	/*
	{
		descripcion: 'Terminar el curso angular',
		fecha: '11-04-16 2:00pm'
	}
	*/
	$scope.$watchCollection('todo',function(newValue,oldValue){
		localStorageService.set("angular-todolist",$scope.todo);
	});
	$scope.addActv = function(){
		$scope.todo.push($scope.newActv);
		$scope.newActv = {};
	}
	$scope.clean = function(){
		$scope.todo = [];
	}
});