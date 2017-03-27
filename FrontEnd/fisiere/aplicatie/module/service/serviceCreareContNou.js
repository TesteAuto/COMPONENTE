export default class serviceCreareContNou {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/crearecontnou');
    }
	
	postData (params) {
		return this.resursa.post(params).then(function (response) {
             return response;
         });
	}
}

serviceCreareContNou.$inject = ['Restangular'];