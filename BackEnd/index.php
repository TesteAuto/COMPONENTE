<?php

require_once("constante.php");
require_once(VENDOR."autoload.php");
require_once(BazeDate."creareBD.php");
require_once(ServiciiREST."creareREST.php");

$app = new \Slim\Slim();

$app->post('/autentificare', 'autentificare');

$app->run();
?>
