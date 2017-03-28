import restangular from 'restangular';
import controllerPrincipal from './controller/controllerPrincipal.js';
import serviceMail from './service/serviceMail.js';

export default angular.module('modulParticular', ['ngMessages','restangular'])
.controller('controllerPrincipal', controllerPrincipal)
.service('serviceMail', serviceMail)
.config(['RestangularProvider',function(RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost/COMPONENTE/BackEnd');
}]);
