<?php

require_once("constante.php");
require_once(VENDOR."autoload.php");
require_once(BazeDate."afisareBD.php");
require_once(ServiciiREST."afisareREST.php");

$app = new \Slim\Slim();

$app->get('/afisare', 'afisare');

$app->run();
?>
