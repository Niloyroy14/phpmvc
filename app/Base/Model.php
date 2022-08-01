<?php

namespace App\Base;

use Exception;

class Model
{

    public function __construct()
    {
        $this->connect();
    }


    public function connect(): \PDO
    {
        try {

            $dbHost = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : '';

            if (empty($dbHost)) {
                throw new Exception('Please provide database host');
            }

            $dbName = isset($_ENV['DB_DATABASE']) ? $_ENV['DB_DATABASE'] : '';

            if (empty($dbName)) {
                throw new Exception('Please provide database name');
            }

            $dbPort = isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : '';

            if (empty($dbPort)) {
                throw new Exception('Please provide database port');
            }

            $dbuserName = isset($_ENV['DB_USERNAME']) ? $_ENV['DB_USERNAME'] : '';

            if (empty($dbuserName)) {
                throw new Exception('Please provide database user name');
            }

            $dbPassword = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : '';
            if (empty($dbPassword)) {
                throw new Exception('Please provide database password');
            }

            $pdo = new \PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbuserName);
            return $pdo;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function execute(string $sqlQuery, array $bindParams = []): \PDOStatement|false
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($bindParams);

        return $stmt;
    }


    public function fetchAll(string $sqlQuery, array $bindParams = []): array|false
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function fetchObj(string $sqlQuery, array $bindParams = []): mixed
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
