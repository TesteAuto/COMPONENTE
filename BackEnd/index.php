<?php

require_once("constante.php");
require_once(VENDOR."autoload.php");
require_once(BazeDate."modificareBD.php");
require_once(ServiciiREST."modificareREST.php");

$app = new \Slim\Slim();

$app->put('/modificareUtilizator/:id', 'modificareUtilizator');

$app->run();
?>
