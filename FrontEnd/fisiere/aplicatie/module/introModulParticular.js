import restangular from 'restangular';
import controllerPrincipal from './controller/controllerPrincipal.js';
import controllerProfil from './controller/controllerProfil.js';
import profilService from './service/profilService.js';

export default angular.module('modulParticular', ['xeditable', 'flow', 'restangular'])
.controller('controllerPrincipal', controllerPrincipal)
.controller('controllerProfil', controllerProfil)
.service('profilService', profilService)
.config(['RestangularProvider',function(RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost/COMPONENTE/BackEnd');
}])
.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; 
});

