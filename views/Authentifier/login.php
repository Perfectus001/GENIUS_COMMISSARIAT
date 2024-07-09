<?php
require_once(__DIR__ . '/../../controllers/AuthController.php');

session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authController = new AuthController();
    $user = $authController->authenticate($username, $password);

    if ($user) {
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['role'] = $user->getRole();

        if ($user->getRole() === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: ../../index.php');
        }
        exit;
    } else {
        $errors['login'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-container label, .form-container input, .form-container button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .form-container button {
            padding: 10px;
            background-color: #007bff; /* Couleur bleue */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Connexion</h1>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Se connecter</button>
        
        <?php if (!empty($errors['login'])): ?>
            <div class="error"><?= htmlspecialchars($errors['login']) ?></div>
        <?php endif; ?>
    </form>
</div>
</body>
</html>