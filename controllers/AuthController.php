<?php
require_once(__DIR__ . '/../dao/UserDAO.php');
require_once(__DIR__ . '/../models/Auth.php');

class AuthController {
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function authenticate($username, $password) {
        $user = $this->userDAO->getUserByUsername($username);

        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }

        return null;
    }

    public function addUser($username, $password, $role) {
        // Vérifier si l'utilisateur existe déjà
        $existingUser = $this->userDAO->getUserByUsername($username);
        if ($existingUser) {
            return false; // Utilisateur existe déjà
        }

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Créer un nouvel objet utilisateur
        $user = new Auth($username, $hashedPassword, $role);

        // Ajouter l'utilisateur
        return $this->userDAO->addUser($user);
    }
}
?>
