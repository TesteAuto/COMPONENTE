class controllerProfil {
	constructor($scope, profilService){
		$scope.defaultImg = true;
		$scope.poza = 'iVBORw0KGgoAAAANSUhEUgAAAJYAAACWBAMAAADOL2zRAAAAG1BMVEVzc3P////Kysrt7e2Wlpa5ubmEhISnp6fc3NwvvdnZAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABWElEQVRoge3TQWvCMBjG8YcR036MEnR6HGPsLGOuHnuQxWMQcR7LNtcdi7O6j70kriooJeJ2e35iwFD/vA0tQEREREREREREREQXS05vx/aD8szWzfGWyICWa2X7vcEFLTfZobCWEM+ysAE9M3YFZr4lXKuPtCgM0tG29aLtluw3tGI9HKYlOtNe3w8zkL3bbn1eafFmWu+DZPKlcrFJ11irvKmVi3u07Szxb8vPtTt77S66dnPFBg9YmqZ7jCFLjKIcV6daIrHXTH1r4nY3jedlWwm0/Y877KPW3EAqvXItNxrWAS0si9WpVtvfW3vXKkPmyp6wbS0OW1Hm783PNQ9toSrscdkzk5X7Xbfmvt+6c0F7njqsJR/HBpCVWgBLXbe+lTJR1R0h7uRSjbPQ1ypyT4409bIn3TKzX4NQUcNTeBbxgc8/SgGvTS8HERERERERERHR//oB7RA/2+QQGmYAAAAASUVORK5CYII=';
		// Imagine
		$scope.imageStrings = [];
		$scope.processFiles = function(files){
			angular.forEach(files, function(flowFile, i){
				var fileReader = new FileReader();
				fileReader.onload = function (event) {
					let uri = event.target.result;
						$scope.imageStrings[i] = uri;    
						$scope.imgSalvata = $scope.imageStrings[i]; 
						$scope.defaultImg = false;
				};
				fileReader.readAsDataURL(flowFile.file);
			});
		};
		//Campuri update
		$scope.utilizator = {
			nume: 'Stela',
			parola: '1234',
			email: 'stela@yahoo.com'
		};
		$scope.salveaza=function(){
		let params = {
			utilizator: $scope.utilizator.nume,
			parola: $scope.utilizator.parola,
			email: $scope.utilizator.email,
			poza: $scope.imgSalvata
		};
		profilService.resursa.id = 1;
		$scope.serv = profilService.putData(params).then(function(response) {
			console.log(response);	
		}, function () {
			console.log("Eroare in controller");
		});
		};
	}
}
controllerProfil.$inject = ['$scope', 'profilService'];
export default controllerProfil;