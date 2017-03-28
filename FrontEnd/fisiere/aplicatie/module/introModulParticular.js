import restangular from 'restangular';
import controllerPrincipal from './controller/controllerPrincipal.js';
import serviceAutentificare from './service/serviceAutentificare.js';

export default angular.module('modulParticular', ['ngMessages','restangular'])
.controller('controllerPrincipal', controllerPrincipal)
.service('serviceAutentificare', serviceAutentificare)
.config(['RestangularProvider',function(RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost/COMPONENTE/BackEnd');
}]);
