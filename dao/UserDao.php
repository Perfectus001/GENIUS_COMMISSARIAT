<?php
require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../models/Auth.php');

class UserDAO {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getUserByUsername($username) {
        try {
            $stmt = $this->db->prepare('SELECT username, password, role FROM users WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return new Auth($user['username'], $user['password'], $user['role']);
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        return null;
    }

    public function addUser($user) {
        try {
            $stmt = $this->db->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
            $stmt->bindParam(':username', $user->getUsername());
            $stmt->bindParam(':password', $user->getPassword());
            $stmt->bindParam(':role', $user->getRole());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
}
?>
