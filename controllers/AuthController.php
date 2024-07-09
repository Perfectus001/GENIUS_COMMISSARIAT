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

    public function addUser($user) {
        return $this->userDAO->addUser($user);
    }
}
?>
