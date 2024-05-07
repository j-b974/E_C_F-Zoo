<?php

namespace integrationService;

use App\Model\MongodbZoo;
use PHPUnit\Framework\TestCase;

class MongoIntegrationTest extends TestCase
{
    public function testMongoDBConnection()
    {
        try {
            MongodbZoo::connection();
            $this->assertTrue(true); // La connexion a réussi
        } catch (MongoDB\Driver\Exception\Exception $e) {
            $this->fail('Connexion à MongoDB échouée : ' . $e->getMessage());
        }
    }

}
