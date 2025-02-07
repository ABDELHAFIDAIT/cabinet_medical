<?php

require_once __DIR__ . './../config/config.php';

class Database {
    private static ?Database $instance = null;
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    private function __construct() {
        $this->host = DB_HOST;
        $this->db = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;

        $this->connect();
    }

    
    private function connect() {
        $dsn = "pgsql:host=$this->host;dbname=$this->db";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../logs/errors.log');
            throw new PDOException("Error connecting to the database.");
        }
    }

    
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    
    public function getConnection() {
        return $this->pdo;
    }
}