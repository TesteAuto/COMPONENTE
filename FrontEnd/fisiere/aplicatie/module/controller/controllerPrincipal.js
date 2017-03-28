class controllerPrincipal {
	constructor($scope,serviceMail){
		// Btn Anulează
		$scope.cancel = function(){
			$scope.email = '';
			$scope.subiect = '';
			$scope.nrCaractere = '';
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
	// Btn Trimite
	$scope.trimiteEmail = function(){
		if($scope.validareEmail($scope.email)){
			console.log("Adresa de e-mail este valida");
			let parametri = {
				email: $scope.email,
				subiect: $scope.subiect,
				mesaj: $scope.nrCaractere
			};
			$scope.serv = serviceMail.postData(parametri).then(function(response) {
				if(response.data.eroare==='Mesajul nu a fost trimis cu succes!'){
					console.log(response.data.eroare);
					sweetAlert("Atenţie!", response.data.eroare, "error");
					$scope.cancel();
				}else{
					swal("Mesajul tău a fost trimis cu succes!", "", "success");
					console.log(response.data);
					$scope.cancel();
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
controllerPrincipal.$inject = ['$scope','serviceMail'];
export default controllerPrincipal;