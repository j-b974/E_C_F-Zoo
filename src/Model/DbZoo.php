<?php

namespace App\Model;
use PDO;

class DbZoo
{
    public static function connection(): PDO
    {
        return new PDO('mysql:host=db;port=3306;dbname=db_zoo', 'admin', '1234', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}
