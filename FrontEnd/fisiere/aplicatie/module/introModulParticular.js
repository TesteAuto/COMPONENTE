import restangular from 'restangular';
import controllerPrincipal from './controller/controllerPrincipal.js';
import serviceCreareContNou from './service/serviceCreareContNou.js';

export default angular.module('modulParticular', ['ngMessages','restangular'])
.controller('controllerPrincipal', controllerPrincipal)
.service('serviceCreareContNou', serviceCreareContNou)
.config(['RestangularProvider',function(RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost/COMPONENTE/BackEnd');
}]);
