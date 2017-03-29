<?php

require_once(VENDOR."autoload.php");
require_once(BazeDate."afisareBD.php");
require_once(ServiciiREST."principal.php");

function afisare(){
	$app = \Slim\Slim::getInstance();
	$db = new Afisare();
	Principal::getServ($app, $db);
	unset($app);
	unset($db);
	R::close();
}

?>