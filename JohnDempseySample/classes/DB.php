<?php

class DB {
    private $server = 'localhost';
    private $database = 'news_aw';
    private $username = 'root';
    private $password = '';

    private $conn;
    private $dsn;

    public function __construct() {
        $this->dsn = "mysql:host={$this->server};dbname={$this->database}";
        $this->conn = null;
    }

    public function open() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO($this->dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                
                echo "Connection failed: " . $e->getMessage();
                exit(); 
            }
        }
    }

    public function isOpen() {
        return $this->conn !== null;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        $this->conn = null;
    }
}
?>