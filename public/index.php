<?php
define('PATH_CONTROLLER', dirname(__DIR__,1).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controller');


require_once ("../vendor/autoload.php");


$router = new \App\Controller\services\RouterZoo(PATH_CONTROLLER);

// ===================== Route visiteur ================
$router->map('/','pages/home','home');

// ===================== Route administration ===============
$router->map('/dashBoard', 'pages/administration/board', 'dashboard');
$router->map('/gestion_de_compte', 'pages/administration/compte', 'compte');
$router->map('/compte_rendu_veterinaire', 'pages/administration/compteRenduVeterinaire', 'comptRenduVeto');


// ===================== Route connection/deconnectin =======
$router->mapBoth( '/connection', 'pages/connection','connection');
$router->map('/deconnection', 'pages/deconnection', 'deconnection');


$router->run();