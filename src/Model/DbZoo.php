<?php

namespace App\Model;
use \PDO;

class DbZoo
{
    public static function connection(): PDO
    {
        $host = getenv('PDO_HOST')?:'localhost';
        $dsn = 'mysql:host='.$host.';port=3306;dbname=db_zoo';
        $user = getenv('PDO_USER') ? getenv('PDO_USER') : 'root';
        $password = getenv('PDO_PASSWORD')? getenv('PDO_PASSWORD'): 'jose';
        return new PDO( $dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}
