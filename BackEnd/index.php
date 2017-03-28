<?php

require_once("constante.php");
require_once(VENDOR."autoload.php");
require_once(ServiciiREST."emailREST.php");

$app = new \Slim\Slim();

$app->post('/email', 'email');

$app->run();
?>