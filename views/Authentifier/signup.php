<?php
require_once(__DIR__ . '/../../controllers/AuthController.php');

$authController = new AuthController();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = 'user'; // Par défaut, le rôle est "user", changez selon vos besoins

    if ($password !== $confirmPassword) {
        $errors['password'] = 'Les mots de passe ne correspondent pas.';
    } else {
        if ($authController->addUser(new Auth($username, password_hash($password, PASSWORD_DEFAULT), $role))) {
            header('Location: login.php');
            exit;
        } else {
            $errors['general'] = 'Erreur lors de l\'inscription. Veuillez réessayer.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
            background-color: #007bff;
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
    <h1>Inscription</h1>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">S'inscrire</button>

        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
