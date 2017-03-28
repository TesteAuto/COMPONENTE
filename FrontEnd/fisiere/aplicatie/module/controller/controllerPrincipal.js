class controllerPrincipal {
	constructor($scope,$window,serviceAutentificare){
		// Btn Anulează
		$scope.cancel = function(){
			$scope.utilizator = '';
			$scope.parola = '';
		};
		// Btn Autentificare cont
		$scope.autentificare = function(){
			   let parametri = {
			   	utilizator: $scope.utilizator,
			   	parola: $scope.parola
			   };
			   $scope.serv = serviceAutentificare.postData(parametri).then(function(response) {
			    	if(response.data[0]!=='Introduceţi credenţiale valide'){
			    		swal("Autentificare reuşită!", "", "success");
			    		let jwtDecode = jwt_decode(response.data[0]);
	                	console.log(jwtDecode.credentials.utilizator);
	                	$scope.cancel();
			   		}else{
			   			console.log(response.data[0]);
				    	sweetAlert("Atenţie!", response.data[0], "error");
				   	    $scope.cancel();
			   	  }
			   }, function () {
			   	console.log("Eroare in controller!!!");
			   	$scope.cancel();
			   });
		};

	}
}
controllerPrincipal.$inject = ['$scope','$window','serviceAutentificare'];
export default controllerPrincipal;