export default class profilService {
    constructor(Restangular) {
         this.resursa = Restangular.one("/modificareUtilizator");
    }
   
	putData(params) {
        return this.resursa.customPUT(params).then(function(data){
            return data;
        });
    }
}

profilService.$inject = ['Restangular'];