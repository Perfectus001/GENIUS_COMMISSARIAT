<?php
require_once(__DIR__ . '/controllers/AuthController.php');

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
            header('Location: dashboard.php');
        } else {
            header('Location: dashboard.php');
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
     <link rel="stylesheet" href="./views/Autorisation/css/login1.css">
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
