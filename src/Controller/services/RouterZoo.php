<?php

namespace App\Controller\services;

require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR.'autoload.php');
class RouterZoo {

    private $router ;
    private $pathDirectory;

    /**
     * @param $path
     */
    public function __construct($path)
    {
        $this->router = new \AltoRouter();
        $this->pathDirectory = $path;
    }

    public function map (string $url , string $pathFile , string $nameRoute = null)
    {
        $this->router->map('GET',$url,$pathFile,$nameRoute);
    }
    public function run()
    {
        $router = $this;
        $match = $this->router->match();

        if($match)
        {

            $params = $match['params'];
            $file = $match['target'];
            require $this->pathDirectory.DIRECTORY_SEPARATOR.$file.'.php';
        }else{
            require(dirname(__DIR__,3).DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."404.html");
        }
    }
    public function url(string $nom , ?array $donne = [])
    {
        return $this->router->generate($nom , $donne);
    }
}