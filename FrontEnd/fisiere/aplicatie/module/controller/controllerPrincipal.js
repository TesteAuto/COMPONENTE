class controllerPrincipal {
	constructor($scope,serviceCreareContNou){
		// Btn Anulează
		$scope.cancel = function(){
			$scope.utilizator = '';
			$scope.parola = '';
			$scope.email = '';
		};
		// Validare camp E-mail
		$scope.validareEmail = function(valoare){
			let sablon=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
			if(sablon.test(valoare)){         
				return true;  
			}else{   
				return false;
			}
		};
		// Btn Crează cont
		$scope.creareContNou = function(){
			if($scope.validareEmail($scope.email)){
			   console.log("Adresa de e-mail este valida");
			   let poza = 'iVBORw0KGgoAAAANSUhEUgAAAJYAAACWBAMAAADOL2zRAAAAG1BMVEVzc3P////Kysrt7e2Wlpa5ubmEhISnp6fc3NwvvdnZAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABWElEQVRoge3TQWvCMBjG8YcR036MEnR6HGPsLGOuHnuQxWMQcR7LNtcdi7O6j70kriooJeJ2e35iwFD/vA0tQEREREREREREREQXS05vx/aD8szWzfGWyICWa2X7vcEFLTfZobCWEM+ysAE9M3YFZr4lXKuPtCgM0tG29aLtluw3tGI9HKYlOtNe3w8zkL3bbn1eafFmWu+DZPKlcrFJ11irvKmVi3u07Szxb8vPtTt77S66dnPFBg9YmqZ7jCFLjKIcV6daIrHXTH1r4nY3jedlWwm0/Y877KPW3EAqvXItNxrWAS0si9WpVtvfW3vXKkPmyp6wbS0OW1Hm783PNQ9toSrscdkzk5X7Xbfmvt+6c0F7njqsJR/HBpCVWgBLXbe+lTJR1R0h7uRSjbPQ1ypyT4409bIn3TKzX4NQUcNTeBbxgc8/SgGvTS8HERERERERERHR//oB7RA/2+QQGmYAAAAASUVORK5CYII=';
			   let parametri = {
			   	utilizator: $scope.utilizator,
			   	parola: $scope.parola,
			   	email: $scope.email,
			   	poza: poza,
			   	status: 'utilizator'
			   };
			   $scope.serv = serviceCreareContNou.postData(parametri).then(function(response) {
			    if(response.data){
			    	if(response.data instanceof Array){
	                	console.log(response.data[0]);
	                	sweetAlert("Atenţie!", response.data[0], "error");
			   		}else{
			   			console.log(response.data);
			   			// $scope.poza = response.data.poza;
				    	swal("Contul a fost creat cu succes!", "", "success");
				   	    $scope.cancel();
			   		}
                	}
			   }, function () {
			   	console.log("Eroare in controller!!!");
			   	$scope.cancel();
			   });
			}else{
			   sweetAlert("Atenţie!", "Vă rugăm să introduceţi o adresă de e-mail validă!", "error");
			}
		};

	}
}
controllerPrincipal.$inject = ['$scope','serviceCreareContNou'];
export default controllerPrincipal;