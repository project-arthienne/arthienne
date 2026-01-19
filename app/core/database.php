<?php

class Database {

    private static $instance = null;
    private $connection;

    private $host = '127.0.0.1';
    private $port = '5432';
    private $dbname = 'arthienne';
    private $username = 'postgres';
    private $password = 'Ak41629#';

    private function __construct() {
        try {
            $this->connection = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
