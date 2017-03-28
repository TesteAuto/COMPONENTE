export default class serviceAutentificare {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/autentificare');
    }
	
	postData (params) {
		return this.resursa.post(params).then(function (response) {
             return response;
         });
	}
}

serviceAutentificare.$inject = ['Restangular'];