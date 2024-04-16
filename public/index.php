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
$router->mapBoth('/compte-supprimer/[i:id]', 'pages/administration/CompteUtilisateur/suprime', 'suprimeCompte');
$router->mapBoth('/creation-de-compte', 'pages/administration/CompteUtilisateur/rajouter', 'addCompte');


// ====================== Route gestion service ================

$router->map('/gestion/service', 'pages/administration/gestionService/service', 'service');
$router->mapBoth('/gestion/service/rajouter/', 'pages/administration/gestionService/rajouter', 'serviceRajouter');
$router->mapBoth('/gestion/service/modifier/[i:id]', 'pages/administration/gestionService/modifier', 'serviceModifier');
$router->mapBoth('/gestion/service/supprime/[i:id]', 'pages/administration/gestionService/supprimer', 'serviceSupprimer');

// ====================== Route gestion habitat =================

$router->map('/gestion/habitat', 'pages/administration/gestionHabitat/habitat' , 'habitat');
$router->mapBoth('/gestion/habitat/modifier/[i:id]', 'pages/administration/gestionHabitat/modifier' , 'habitatModifier');
$router->mapBoth('/gestion/habitat/supprimer/[i:id]', 'pages/administration/gestionHabitat/supprimer' , 'habitatSupprimer');
$router->mapBoth('/gestion/habitat/rajouter', 'pages/administration/gestionHabitat/rajouter' , 'habitatCreer');

// ===================== Gestion annimaux ===================

$router->map('/gestion/annimaux', 'pages/administration/gestionAnnimaux/annimaux' , 'annimaux');
$router->mapBoth('/gestion/annimaux/rajouter', 'pages/administration/gestionAnnimaux/rajouter' , 'annimauxRajouter');
$router->mapBoth('/gestion/annimaux/modifier/[i:id]', 'pages/administration/gestionAnnimaux/modifier' , 'annimauxModifier');
$router->mapBoth('/gestion/annimaux/supprimer/[i:id]', 'pages/administration/gestionAnnimaux/supprimer' , 'annimauxSupprimer');

// ==================== Veterinaire compte rendu ===========

$router->map('/compte_rendu_veterinaire', 'pages/administration/compteRenduVeterinaire/compteRenduVeterinaire', 'comptRenduVeto');
$router->map('/compte_rendu_veterinaire/[i:id]', 'pages/administration/compteRenduVeterinaire/compteRenduVeterinaireSingle', 'comptRenduVetoSingle');
$router->mapBoth('/compte_rendu_veterinaire/rediger' ,'pages/administration/compteRenduVeterinaire/rediger', 'creeCompteRenduVeto');
$router->mapBoth('/compte_rendu_veterinaire/modifier/[i:id]' ,'pages/administration/compteRenduVeterinaire/modifier', 'modifierCompteRenduVeto');
$router->mapBoth('/compte_rendu_veterinaire/suppresion/[i:id]' ,'pages/administration/compteRenduVeterinaire/supprimer', 'supprimerCompteRenduVeto');

// ===================== Route compte rendu Employer ==========

$router->map('/Compte_rendu_employe', 'pages/administration/compteRenduEmployer/CompteRendu','compteRenduEmploye');
$router->mapBoth('/Compte_rendu_employe/rediger', 'pages/administration/compteRenduEmployer/rediger','compteRenduEmployeRediger');
$router->mapBoth('/Compte_rendu_employe/modifier/[i:id]', 'pages/administration/compteRenduEmployer/modifier','compteRenduEmployeModifier');
$router->mapBoth('/Compte_rendu_employe/supprimer/[i:id]', 'pages/administration/compteRenduEmployer/supprimer','compteRenduEmployeSupprimer');


// ===================== Route connection/deconnectin =======
$router->mapBoth( '/connection', 'pages/connection','connection');
$router->map('/deconnection', 'pages/deconnection', 'deconnection');


$router->run();