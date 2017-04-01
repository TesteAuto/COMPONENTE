<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."modificareBD.php");
require_once(ServiciiREST."principal.php");

function modificareUtilizator($id){
	$app = \Slim\Slim::getInstance();
	$db = new Modificare();
	Principal::putServ($app, $db, $id);
	unset($app);
	unset($db);
	R::close();
}

?>