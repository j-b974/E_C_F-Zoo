<?php
/**
 * @descript verifier accée au router
 */

namespace App\Controller\services;

class Verificateur
{
    public static function verifieConnection($router)
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!isset($_SESSION['utilisateur']))
        {
            header('Location:'.$router->url('connection'), true , 301);
            exit();
        }
    }
    public static function verifieNonConnection($router)
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(isset($_SESSION['utilisateur']))
        {
            header('Location:'.$router->url('deconnection'), true , 301);
            exit();
        }

    }
    public static function checkRole($router , $lstRole)
    {
        self::verifieConnection($router);
        $role = $_SESSION['utilisateur']->getrole()->getLabel();

        if(!in_array($role , $lstRole)){
            header('Location:'.$router->url('home'),
                true , 301);
            exit();
        }
    }

    /**
     * @param int $idParam la id paramettre actuelle
     * @param array $lstIdParam la liste des id des paramettre autoriser
     * @return void
     */
    public static function checkRestrition( int $idParam , array $lstIdParam, $router):void
    {
        if(!in_array($idParam,$lstIdParam))
        {
            header('Location:'.$router->url('dashboard'), true , 301);
        }
    }

}