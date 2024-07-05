<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'dbcommissariat';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    public function query($query) {
        return $this->conn->query($query);
    }
}

?>
