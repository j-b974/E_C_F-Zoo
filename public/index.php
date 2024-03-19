<?php
define('PATH_CONTROLLER', dirname(__DIR__,1).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controller');


require_once ("../vendor/autoload.php");


$router = new \App\Controller\services\RouterZoo(PATH_CONTROLLER);

$router->map('/','pages/home','home');


$router->run();