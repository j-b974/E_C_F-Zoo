<?php

namespace integrationService;

use App\Model\DbZoo;

class MysqlIntegrationTest extends \PHPUnit\Framework\TestCase
{
    private $pdo;
    public function testMysqlConnection()
    {
        try {
            DbZoo::connection();
            $this->assertTrue(true); // La connexion a réussi
        } catch (PDOException $e) {
            $this->fail('Connexion à MySQL échouée : ' . $e->getMessage());
        }
    }
    protected function setUp(): void
    {
        $this->pdo = DbZoo::connection();
    }

    public function testTableUtilisateurExists()
    {
        $stmt = $this->pdo->query("SHOW TABLES LIKE 'utilisateur'");
        $tableExists = $stmt->rowCount() > 0;
        $this->assertTrue($tableExists, 'La table "utilisateur" n\'existe pas dans la base de données.');
    }

    public function testTableRoleExists()
    {
        $stmt = $this->pdo->query("SHOW TABLES LIKE 'role'");
        $tableExists = $stmt->rowCount() > 0;
        $this->assertTrue($tableExists, 'La table "role" n\'existe pas dans la base de données.');
    }

    public function testTableAvisExists()
    {
        $stmt = $this->pdo->query("SHOW TABLES LIKE 'avis'");
        $tableExists = $stmt->rowCount() > 0;
        $this->assertTrue($tableExists, 'La table "avis" n\'existe pas dans la base de données.');
    }

    public function testRoleValues()
    {
        $roles = ['employer', 'veterinaire', 'administrateur'];

        foreach ($roles as $role) {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM role WHERE label = ?");
            $stmt->execute([$role]);
            $count = $stmt->fetchColumn();

            $this->assertGreaterThan(0, $count, 'La valeur "'.$role.'" n\'existe pas dans la table "role".');
        }
    }

}
