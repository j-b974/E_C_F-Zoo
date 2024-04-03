<?php

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

}