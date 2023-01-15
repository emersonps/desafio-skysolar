<?php

namespace App\DAO\MySQL\Skysolar;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = getenv('SKYSOLAR_MYSQL_HOST');
        $port = getenv('SKYSOLAR_MYSQL_PORT');
        $user = getenv('SKYSOLAR_MYSQL_USER');
        $pass = getenv('SKYSOLAR_MYSQL_PASSWORD');
        $dbname = getenv('SKYSOLAR_MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }  
}