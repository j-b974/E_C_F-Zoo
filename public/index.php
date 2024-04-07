<?php
define('PATH_CONTROLLER', dirname(__DIR__,1).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controller');

require_once ("../vendor/autoload.php");

$router = new \App\Controller\services\RouterZoo(PATH_CONTROLLER);

// ===================== Route visiteur ================
$router->map('/','pages/home','home');

// ===================== Route administration ===============

$router->map('/dashBoard', 'pages/administration/board', 'dashboard');
$router->map('/gestion-de-compte', 'pages/administration/CompteUtilisateur/compte', 'compte');
$router->mapBoth('/compte/modifier/[i:id]', 'pages/administration/CompteUtilisateur/modifier', 'modifCompte');
$router->mapBoth('/compte-suprimer/[i:id]', 'pages/administration/CompteUtilisateur/suprime', 'suprimeCompte');
$router->mapBoth('/creation-de-compte', 'pages/administration/CompteUtilisateur/rajouter', 'addCompte');
$router->map('/compte_rendu_veterinaire', 'pages/administration/compteRenduVeterinaire', 'comptRenduVeto');

// ====================== Route gestion service ================

$router->map('/gestion/service', 'pages/administration/gestionService/service', 'service');
$router->mapBoth('/gestion/service/rajouter/', 'pages/administration/gestionService/rajouter', 'serviceRajouter');
$router->mapBoth('/gestion/service/modifier/[i:id]', 'pages/administration/gestionService/modifier', 'serviceModifier');
$router->mapBoth('/gestion/service/supprime/[i:id]', 'pages/administration/gestionService/supprimer', 'serviceSupprimer');


// ===================== Route connection/deconnectin =======
$router->mapBoth( '/connection', 'pages/connection','connection');
$router->map('/deconnection', 'pages/deconnection', 'deconnection');


$router->run();