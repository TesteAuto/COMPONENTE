export default class serviceMail {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/email');
    }
	
	postData (params) {
		return this.resursa.post(params).then(function (response) {
             return response;
         });
	}
}

serviceMail.$inject = ['Restangular'];